<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TeachersExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $employees = Employee::all();

        $teachers = [];
        foreach ($employees as $key => $value) {
            $jenisPtk = $employees[$key]['jenis_ptk'];

            if (in_array($jenisPtk, [
                'Guru Mapel',
                'Guru Mata Pelajaran',
                'Guru Kelas',
                'Guru BK',
                'Guru Inklusi',
                'Guru Pendamping',
                'Guru Magang',
                'Guru TIK'
            ])) array_push($teachers, $employees[$key]);
        }
        return $teachers;
    }

        /**
    * @var User $user
    */
    public function map($user): array
    {
        return [
            $user->id,
            $user->nama,
            $user->nip,
            $user->niy_nigk,
            $user->nuptk,
            $user->status_pegawai,
            $user->jenis_ptk,
            $user->alamat,
            $user->sk_pengangkatan,
            $user->tmt_pengangkatan,
            $user->lembaga_pengangkatan,
            $user->sk_cpns,
            $user->tmt_pns,
            $user->pangkat,
            $user->sumber_gaji,
            $user->kartu_pegawai,
            $user->kartu_istri,
            $user->kartu_suami,
            $user->ktp,
            $user->kk,
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'Nama',
            'NIP',
            'NIY/NIGK',
            'NUPTK',
            'Status Pegawai',
            'Jenis PTK',
            'SK Pengangkatan',
            'TMT Pengangkatan',
            'Lembaga Pengangkatan',
            'SK CPNS',
            'TMT PNS',
            'Pangkat',
            'Sumber Gaji',
            'Kartu Pegawai',
            'Kartu Istri',
            'Kartu Suami',
            'KTP',
            'KK',
        ];
    }
}
