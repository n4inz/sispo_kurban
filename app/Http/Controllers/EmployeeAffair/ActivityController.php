<?php

namespace App\Http\Controllers\EmployeeAffair;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPaketKurban;
use App\Service\Database\EmployeeActivityService;
use App\Service\Database\EmployeeService;
use App\Service\Database\HewanKurban\HewanKurbanService;
use App\Service\Database\HewanKurban\KeuanganService;
use App\Service\Database\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function index()
    {
        $activityDb = new EmployeeActivityService;

        $user = Auth::user();

        $payload = [
            'employee_id' => $user->userable_id,
        ];

        $userDb = new UserService;
        $members = $userDb->index()['data'] ?? [];
        $employeeDb = new EmployeeService;
        $employees =  $activityDb->index()['data'];

        foreach ($employees as $key => $value) {
            $employees[$key]['nama_pegawai'] = $employeeDb->detail($employees[$key]['employee_id'])['nama'];
        }

        $pribadi =  $activityDb->index($payload)['data'];

        $activities['pribadi'] = $pribadi;
        $activities['employees'] = $employees;

        // dd($activities);

        return view('employee_affair.activity.index', compact('activities', 'user'));
    }

    public function getActivity()
    {
        $employeeDB = new KeuanganService;

        $employees = $employeeDB->index(['order_by' => 'ASC' ,'status' => [1]])['data'] ?? [];

        $activities['pribadi'] = [];
        $activities['employees'] = $employees;

        return response()->json($activities);
    }

    public function edit($activityId)
    {
        
        $paket = UserPaketKurban::find($activityId);
        $paket->status_paid = UserPaketKurban::paid;
        $paket->save();
        return redirect()->back();
    }

    public function update(Request $request, $activityId)
    {
        $activityDb = new EmployeeActivityService;

        $payload = [
            'nama_kegiatan' => $request->nama_kegiatan,
            'tgl_kegiatan' => $request->tgl_kegiatan,
            'kategori' => $request->kategori,
        ];

        $activityDb->update($activityId, $payload);

        return redirect()->route('employee.activity.index')
            ->with('success', 'Data berhasil diubah');
    }

    public function delete($activityId)
    {
        $paket = UserPaketKurban::find($activityId);
        $paket->delete();
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $activityDb = new EmployeeActivityService;


        $payload = [
            'nama_kegiatan' => $request->nama_kegiatan,
            'tgl_kegiatan' => $request->tgl_kegiatan,
            'kategori' => $request->kategori,
        ];

        $activities = $activityDb->create($payload);

        // dd($tes);

        return response()->json($activities);
    }
}
