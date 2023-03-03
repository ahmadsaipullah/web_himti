<?php

namespace App\Exports;

use App\Models\kelompokBelajar;
use Maatwebsite\Excel\Concerns\FromCollection;

class kelompokBelajarExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return kelompokBelajar::all();
    }
}
