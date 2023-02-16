<?php

namespace App\Exports;

use App\Models\sertifikat;
use Maatwebsite\Excel\Concerns\FromCollection;

class sertifikatExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return sertifikat::all();
    }
}
