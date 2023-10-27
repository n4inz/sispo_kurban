<?php

namespace App\Http\Controllers\Paket;

use App\Http\Controllers\Controller;
use App\Models\HewanKurban;
use Illuminate\Http\Request;

class PaketKurbanController extends Controller
{
    
    public function index(Request $request)
    {
        $user = $request->user();
        $pakets = HewanKurban::with(['user_kelompok' => function($user){
            $user->with('user');
        }])->get();
        return view('Kurban.paket_kurban' , compact('user' , 'pakets'));
    }
}
