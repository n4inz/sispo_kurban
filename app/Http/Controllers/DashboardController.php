<?php

namespace App\Http\Controllers;

use App\Models\HewanKurban;
use App\Models\HewanKurbanV2;
use App\Models\Student;
use App\Models\User;
use App\Models\UserPaketKurban;
use App\Service\Database\EmployeeService;
use App\Service\Database\UserService;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $currentYear = Carbon::now()->year;
        $years = [];
        $dataCounts = [];
        for ($i = 5; $i >= 0; $i--) {
            $year = $currentYear - $i;
            $years[] = $currentYear - $i;
            $count = HewanKurbanV2::whereYear('created_at', $year)->count();
            $dataCounts[] = $count;
        }

      
        $user = Auth::user();

        $employeeDB = new EmployeeService;
        $employees = $employeeDB->index(['order_by' => 'ASC'])['data'] ?? [];

        $userDB = new UserService;
        $users = $userDB->index(['order_by' => 'ASC'])['data'] ?? [];

        $teachers = 0;
        $staffs = 0;
        $students = count(Student::all());
        foreach ($employees as $key => $value) {
            $jenisPtk = $employees[$key]['jenis_ptk'];

            $empKey = array_search($employees[$key]['id'], array_column($users, 'userable_id'));
            $employees[$key]['username'] = $users[$empKey]['username'];
            $employees[$key]['status'] = $users[$empKey]['status'];

            if (in_array($jenisPtk, [
                'Guru Mapel',
                'Guru Mata Pelajaran',
                'Guru Kelas',
                'Guru BK',
                'Guru Inklusi',
                'Guru Pendamping',
                'Guru Magang',
                'Guru TIK'
            ])) $teachers++;

            if (in_array($jenisPtk, [
                'Tenaga Administrasi Sekolah',
                'Laboran',
                'Pustakawan',
            ])) $staffs++;
        }

        $users['teachers'] = $teachers;
        $users['staffs'] = $staffs;
        $users['students'] = $students;
        $users['employees'] = count($employees)+1;

        $pendaftar = User::where('role' ,'STUDENT')->count();
        $kelompok = HewanKurban::query()->count();
        $saldoKhas = UserPaketKurban::where('status_paid' ,UserPaketKurban::paid)->sum('jumlah_bayar');
        $waiting = UserPaketKurban::where('status_paid' ,UserPaketKurban::waiting)->count();
        $datas = [
            'pendaftar' => $pendaftar,
            'kelompok' => $kelompok,
            'saldoKhas' => $saldoKhas,
            'waiting' => $waiting,
        ];
        
        return view('dashboard', compact('user' , 'datas','years','dataCounts'));
    }
}
