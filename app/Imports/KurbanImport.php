<?php

namespace App\Imports;

use App\Models\HewanKurbanV2;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;

class KurbanImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $user = request()->user();
        
        $index = 1;
        foreach($collection as $row){
            if($index > 1){
                
                $visitDB = new HewanKurbanV2();

                $visitDB->user_id = $user->id;
                $visitDB->nama_hewan = $row[0];
                $visitDB->jenis =  $row[1];
                $visitDB->harga = $row[2];
                $visitDB->jumlah_hewan = $row[3];
                $visitDB->nama_keluarga= $row[4];
                $visitDB->alamat= $row[5];
                $visitDB->ket= $row[6];
                $visitDB->save();
              
            }

            $index++;
        }
    
    }
}
