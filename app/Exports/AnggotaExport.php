<?php

namespace App\Exports;

use App\Models\anggota;
use App\Models\angkatan;
use Maatwebsite\Excel\Concerns\FromCollection;

class AnggotaExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return anggota::all();
    }
}
