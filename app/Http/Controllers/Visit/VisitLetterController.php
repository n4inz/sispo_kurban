<?php

namespace App\Http\Controllers\Visit;

use App\Http\Controllers\Controller;

use App\Service\Database\VisitLetterService;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VisitFinishesExport;
use App\Imports\KurbanImport;
use App\Models\HewanKurban;
use App\Models\HewanKurbanV2;

use App\Models\VisitLetter;
use App\Service\Database\HewanKurban\HewanKurbanService;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
        // return $request;
        //https://medium.com/@akhwan90/laravel-queue-membuat-fitur-import-data-pegawai-excel-3f1561b25e0
        // https://opensource.box.com/spout/getting-started/
        $user = $request->user();
        
        $visitDB = new HewanKurbanV2();

        $visitDB->user_id = $user->id;
        $visitDB->nama_hewan = $request->nama_hewan;
        $visitDB->jenis = $request->jenis;
        $visitDB->harga = $request->harga;
        $visitDB->jumlah_hewan = $request->jumlah_hewan;
        $visitDB->nama_keluarga= $request->keluarga;
        $visitDB->alamat= $request->alamat;
        $visitDB->kecamatan= $request->kecamatan;
        $visitDB->ket= $request->ket;
        $visitDB->save();
       

        return redirect()->route('visit_letter.index')
        ->with('success', 'Data berhasil ditambahkan');
    }

    public function import(Request $request)
    {
        Excel::import(new KurbanImport(),$request->file('file'));
        // $filePath = $request->file('file');
      

        return redirect()->back()->with('Success', 'Insert data kurban berhasil');
       
    }


    public function update($visitLetterId, Request $request)
    {
        $user = $request->user();
        $hewanKurban  = HewanKurbanV2::find($visitLetterId);

        $hewanKurban->user_id = $user->id;
        $hewanKurban->nama_hewan = $request->nama_hewan;
        $hewanKurban->jenis = $request->jenis;
        $hewanKurban->harga = $request->harga;
        $hewanKurban->jumlah_hewan = $request->jumlah_hewan;
        $hewanKurban->nama_keluarga= $request->keluarga;
        $hewanKurban->alamat= $request->alamat;
        $hewanKurban->kecamatan= $request->kecamatan;
        $hewanKurban->ket= $request->ket;

        $hewanKurban->save();
      
      

        return back()->with('success', 'Data berhasil diperbarui');
    }



    public function delete($visitLetterId)
    {
       $hewanKurban = HewanKurbanV2::find($visitLetterId);
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
