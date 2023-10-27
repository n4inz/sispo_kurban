<?php

namespace App\Http\Controllers\Visit;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\Database\VisitLetterService;
use App\Service\Database\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VisitFinishesExport;
use App\Models\HewanKurban;
use App\Models\JenisHewan;
use App\Models\VisitLetter;
use App\Service\Database\HewanKurban\HewanKurbanService;

class VisitLetterController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $visitDB = new HewanKurbanService;
        $visit = $visitDB->index()['data'] ?? [];
        
        $tgl_visits = [];

        return view('visit.index', compact('user', 'tgl_visits'));
    }

    public function detail($visitLetterId)
    {
        $user = Auth::user();

        $visitDB = new VisitLetterService;
        $visit = $visitDB->detail($visitLetterId);
        return view('visit.detail', compact('visit', 'user'));
    }

    public function edit($visitLetterId)
    {
        $user = Auth::user();

        $visitDB = new VisitLetterService;
        $visit = $visitDB->detail($visitLetterId);
        return view('visit.detail', compact('visit', 'user'));
    }

    public function getVisitLetters(Request $request)
    {
        $user = Auth::user();
        $visitDB = new HewanKurbanService;

        if ($request->tanggal !== null) {
            $visits = $visitDB->index(['order_by' => 'ASC', 'tanggal' => $request->tanggal])['data'] ?? [];
        } else {
            $visits = $visitDB->index(['order_by' => 'ASC'])['data'] ?? [];
        }

        // $archives = $visitDB->index(['order_by' => 'ASC', 'status' => VisitLetter::SELESAI])['data'] ?? [];
        $archives =  [];

        $data = [
            'visits' => $visits,
            'archives' => $archives,
        ];

        return response()->json($data);
    }

    public function create(Request $request)
    {
        $visitDB = new HewanKurban();

        $visitDB->nama_hewan = $request->nama_hewan;
        $visitDB->jenis = $request->jenis;
        $visitDB->harga = $request->harga;
        $visitDB->jumlah_peserta = $request->peserta;
        $visitDB->harga_per_orang = $request->harga_per_orang;
        $visitDB->ket= $request->ket;

        $visitDB->save();

        JenisHewan::updateOrCreate(
        [   'hewan' => $request->nama_hewan ,
            'jenis' => $request->jenis
        ], 
        [
            'hewan' => $request->nama_hewan , 
            'jenis' => $request->jenis
        ]
        );
        return redirect()->route('visit_letter.index')
        ->with('success', 'Data berhasil ditambahkan');
    }


    public function update($visitLetterId, Request $request)
    {
        $hewanKurban  = HewanKurban::find($visitLetterId);

        $hewanKurban->nama_hewan = $request->nama_hewan;
        $hewanKurban->jenis = $request->jenis;
        $hewanKurban->harga = $request->harga;
        $hewanKurban->jumlah_peserta = $request->peserta;
        $hewanKurban->harga_per_orang = $request->harga_per_orang;
        $hewanKurban->ket= $request->ket;

        $hewanKurban->save();
      
      

        return back()->with('success', 'Data berhasil diperbarui');
    }



    public function delete($visitLetterId)
    {
       $hewanKurban = HewanKurban::find($visitLetterId);
        $hewanKurban->delete();
        return redirect()->route('visit_letter.index')
            ->with('success', 'Data berhasil dihapus');
    }

    public function exportVisitFinish()
    {
        $date = Carbon::now()->locale('id_ID')->isoFormat('DD-MM-YYYY');
        return Excel::download(new VisitFinishesExport, 'DATA-SELESAI-SURAT-KUNJUNGAN-SMK-WIKRAMA-BOGOR-'.$date.'.xlsx');
    }
}
