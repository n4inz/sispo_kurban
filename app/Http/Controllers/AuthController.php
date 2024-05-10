<?php

namespace App\Http\Controllers;

use App\Models\HewanKurban;
use App\Models\UserPaketKurban;
use App\Service\Database\StudentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        $pakets = HewanKurban::query()->withCount('user_kelompok')->with('user_kelompok')->get();
        return view('index' , compact('pakets'));
    }
    public function check(Request $request){
        if (! Auth::check() && $request->is('login')) {
            return view('login');
        } elseif (! Auth::check()) {
            return redirect('login');
        }

        return redirect('dashboard');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
            'remember_me' => 'boolean'
        ]);

        if (Auth::attempt(($credentials + ['status' => true]), $request->get('remember'))){
            return redirect('dashboard');
        } else {
            return redirect('login')->with('success', 'false');
        }

        return redirect('login');
    }

    public function daftar_kurban()
    {
        return view('daftar');
    }

    public function daftar(Request $request)
    {
        $insert = new StudentService;
        $payload = [
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'kurban' => $request->kurban,
            'password' => $request->password
          
        ];
        $student = $insert->createV2($payload);
        // $hewanKurban = HewanKurban::find($request->pakets);
        
        // $userPaket = new UserPaketKurban();
    //     $userPaket->user_id = $student['id'];
    //     $userPaket->jumlah_bayar = $hewanKurban->harga_per_orang;
    //     $userPaket->hewan_kurbans_id = $request->pakets;
    //     $userPaket->save();
        
       

    //     $email_text = "
    //         Email: {$student['email']}<br />
    //         Password: {$student['cupon']}<br />
    //         Total Bayar: Rp. " . $hewanKurban->harga_per_orang . "<br />
    //         ";

    //     $mail_data = [
    //             'email_text' => $email_text
    //     ];

    //    $email_from = 'testing@mail.com';
    //    $email_to = $student['email'];
    //     Mail::send('emails.succes_daftar', $mail_data, function ($message) use ($email_from, $email_to) {
    //         $message->from($email_from, 'Baznas');
    //         $message->to($email_to, 'Admin')->subject('Pendaftaran Kurban');
    //     });
      
       return redirect('login')->with('success', 'false');
    }

    public function logout(){
        Auth::logout();

        return redirect('/login');
    }
}
