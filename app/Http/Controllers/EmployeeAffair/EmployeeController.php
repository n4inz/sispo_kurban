<?php

namespace App\Http\Controllers\EmployeeAffair;

use App\Exports\EmployeesExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPaketKurban;
use App\Service\Database\EmployeeService;
use App\Service\Database\HewanKurban\KeuanganService as HewanKurbanKeuanganService;
use App\Service\Database\KeuanganService\KeuanganService;
use App\Service\Database\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // $employeeDB = new HewanKurbanKeuanganService;

        // $employees = $employeeDB->index(['order_by' => 'ASC'])['data'] ?? [];
        // return $employees;
        return view('employee_affair.employee.index', compact('user'));
    }

    public function detail($employeeId)
    {
        $user = Auth::user();
        if ($user->userable_id !== $employeeId &&
            $user->role !== User::ADMIN
        ) return redirect()->route('employee.index');

        $employeeDB = new EmployeeService;
        $employee = $employeeDB->detail($employeeId);
        return view('employee_affair.employee.detail', compact('employee', 'user'));
    }

    public function edit($employeeId)
    {
        $user = Auth::user();
        if ($user->userable_id !== $employeeId &&
            $user->role !== User::ADMIN
        ) return redirect()->route('employee.index');

        $employeeDB = new EmployeeService;
        $employee = $employeeDB->detail($employeeId);
        return view('employee_affair.employee.detail', compact('employee', 'user'));
    }

    public function getUsers(Request $request)
    {
        $user = Auth::user();
        $status = $request->get('status');
        $periode = $request->get('periode');
        Log::info($status);
        $employeeDB = new HewanKurbanKeuanganService;
        $employees = $employeeDB->index(
            [
                'order_by' => 'ASC' , 
                'status' => $status !== null ? [$status] : [2,0],
                'periode' => $periode
            ])['data'] ?? [];
        
        // if ($user->role === User::ADMIN){
        //     $userDB = new UserService;
        //     $members = $userDB->index(['order_by' => 'ASC'])['data'] ?? [];
        // }

        $teachers = [];
        $staffs = [];
        // foreach ($employees as $key => $value) {
        //     $jenisPtk = $employees[$key]['jenis_ptk'];

        //     if ($user->role === User::ADMIN) {
        //         $empKey = array_search($employees[$key]['id'], array_column($members, 'userable_id'));
        //         $employees[$key]['username'] = $members[$empKey]['username'];
        //         $employees[$key]['status'] = $members[$empKey]['status'];
        //     }

        //     if (in_array($jenisPtk, [
        //         'Guru Mapel',
        //         'Guru Mata Pelajaran',
        //         'Guru Kelas',
        //         'Guru BK',
        //         'Guru Inklusi',
        //         'Guru Pendamping',
        //         'Guru Magang',
        //         'Guru TIK'
        //     ])) array_push($teachers, $employees[$key]);

        //     if (in_array($jenisPtk, [
        //         'Tenaga Administrasi Sekolah',
        //         'Laboran',
        //         'Pustakawan',
        //     ])) array_push($staffs, $employees[$key]);
        // }

        $users['teachers'] = $teachers;
        $users['staffs'] = $staffs;
        $users['employees'] = $employees;

        return response()->json($users);
    }

    public function createUser(Request $request)
    {
        $employeeDB = new EmployeeService;

        $payload = [
            'nama' => $request->nama,
            'niy_nigk' => $request->niy_nigk,
            'status_pegawai' => $request->status_pegawai,
            'jenis_ptk' => $request->jenis_ptk,
        ];
        $employee = $employeeDB->create($payload);

        return response()->json($employee);
    }

    public function delete_keuangan(Request $request)
    {
        $employeeDB = UserPaketKurban::find($request->id);
        $employeeDB->delete();
        // $employee = $employeeDB->resetPassword($request->id);

        return response()->json($employeeDB);
    }

    public function updateUser($employeeId, Request $request)
    {
        $user = Auth::user();
        $employeeDB = new EmployeeService;

        if ($user->userable_id !== $employeeId &&
            $user->role !== User::ADMIN
        ) return redirect()->route('employee.index');

        $payload = $request->all();
        unset($payload['_token']);
        unset($payload['_method']);
        unset($payload['id']);

        if (isset($payload['tmt_pengangkatan']) || isset($payload['tmt_pns'])) {
            $payload['tmt_pengangkatan'] = Carbon::createFromFormat('d/m/Y', $request->tmt_pengangkatan)->format('Y-m-d');
            $payload['tmt_pns'] = Carbon::createFromFormat('d/m/Y', $request->tmt_pns)->format('Y-m-d');
        }

        $employeeDB->update($employeeId, $payload);

        return redirect()->back()->with('success', 'Berhasil memperbarui data pegawai');
    }

    public function toggleStatus($employeeId)
    {
        $user = Auth::user();
        $employeeDB = new EmployeeService;

        if ($user->userable_id !== $employeeId &&
            $user->role !== User::ADMIN
        ) return redirect()->route('employee.index');

        $employee = $employeeDB->toggleStatus($employeeId);

        return response()->json($employee);
    }

    public function exportEmployee()
    {
        
        $datas = UserPaketKurban::query()->with('user')
        ->where('status_paid' ,UserPaketKurban::paid)
        ->get();
       
        $pdf = Pdf::loadView('pdf.export_keuangan', ['datas' => $datas]);
        return $pdf->download('kurban.pdf');
    }

    public function exportTeacher()
    {
        $date = Carbon::now()->locale('id_ID')->isoFormat('DD-MM-YYYY');
        return Excel::download(new EmployeesExport, 'DATA-GURU-SMK-WIKRAMA-BOGOR-'.$date.'.xlsx');
    }

    public function exportStaff()
    {
        $date = Carbon::now()->locale('id_ID')->isoFormat('DD-MM-YYYY');
        return Excel::download(new EmployeesExport, 'DATA-STAF-SMK-WIKRAMA-BOGOR-'.$date.'.xlsx');
    }
}
