<?php

namespace App\Http\Controllers\StudentAffair;

use App\Http\Controllers\Controller;
use App\Models\HewanKurban;
use App\Models\User;
use App\Models\UserPaketKurban;
use App\Service\Database\StudentService;
use App\Service\Database\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return view('student_affair.student.index', compact('user'));
    }

    public function detail($studentId)
    {
        $user = Auth::user();
        // return $user->kelompok->hewan_kurbans_id;

        $kelompoks = HewanKurban::where('id',$user->kelompok->hewan_kurbans_id)
        ->with('user_kelompok' , function($user){
            $user->wherehas('user')->with('user');
        })
        ->first();
        
        // return $kelompoks;
        return view('student_affair.student.detail', compact('kelompoks', 'user'));
    }

    public function konfirmasiPembayaran(Request $request)
    {
        $user = Auth::user();

        $userKurban = UserPaketKurban::where('user_id', $user->id)->first();
        
        return view('student_affair.student.konfirmasi_pembayaran', compact('user' , 'userKurban'));
    }

    public function upload_resi(Request $request)
    {
        $user = $request->user();
        $request->validate([
            'file' => 'required|file|mimes:jpg,png,jpeg',
        ]);
    
        // Store the uploaded file
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
      
        $file->storeAs('uploads', $fileName);

        UserPaketKurban::where('user_id', $user->id)->update([
            'resi_img' => $fileName,
            'status_paid' => UserPaketKurban::waiting
        ]);
    
        // You can also save file information to a database here if needed
    
        return redirect()->back()->with('success', 'File uploaded successfully');
    }

    public function edit($studentId)
    {
        $user = Auth::user();
        if ($user->userable_id !== $studentId && $user->role !== User::ADMIN) return redirect()->route('dashboard');

        $studentDb = new StudentService;
        $student = $studentDb->detail($studentId);
        return view('student_affair.student.detail', compact('student', 'user'));
    }

    public function getUsers()
    {
        $user = Auth::user();
        $studentDb = new StudentService;

        $students = $studentDb->index(['order_by' => 'ASC'])['data'] ?? [];

        if ($user->role === User::ADMIN) {
            $userDB = new UserService;
            $members = $userDB->index(['order_by' => 'ASC'])['data'] ?? [];
        }

        foreach ($students as $key => $value) {
            if ($user->role === User::ADMIN) {
                $empKey = array_search($students[$key]['id'], array_column($members, 'userable_id'));
                $students[$key]['username'] = $members[$empKey]['username'];
            }
        }

        $users['students'] = $students;

        return response()->json($users);
    }

    public function createUser(Request $request)
    {
        $studentDb = new StudentService;

        $payload = [
            'nama' => $request->nama,
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ];
        $student = $studentDb->create($payload);

        return response()->json($student);
    }

    public function resetPassword(Request $request)
    {
        $studentDb = new StudentService;

        $student = $studentDb->resetPassword($request->id);

        return response()->json($student);
    }

    public function toggleStatus($studentId)
    {
        $user = Auth::user();
        $studentDb = new StudentService;

        if ($user->role !== User::ADMIN) return redirect()->route('student.index');

        $student = $studentDb->toggleStatus($studentId);

        return response()->json($student);
    }

    public function updateUser($studentId, Request $request)
    {
        $user = Auth::user();
        $studentDb = new StudentService;

        if ($user->userable_id !== $studentId) return redirect()->route('dashboard');
        // if ($user->role !== User::ADMIN) return redirect()->route('student.index');

        $payload = $request->all();
        unset($payload['_token']);
        unset($payload['_method']);
        unset($payload['id']);

        if (isset($payload['tanggal_lahir'])) {
            $payload['tanggal_lahir'] = Carbon::parse($payload['tanggal_lahir'])->format('Y-m-d');
        }

        $studentDb->update($studentId, $payload);

        return redirect()->back()->with('success', 'Berhasil memperbarui data siswa');
    }
}
