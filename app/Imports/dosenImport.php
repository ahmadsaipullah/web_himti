<?php

namespace App\Imports;

use App\Models\dosen;
use Maatwebsite\Excel\Concerns\ToModel;

class dosenImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new dosen([
            'nidn' => $row[0],
            'nama' => $row[1],
            'email' => $row[2],
            'no_hp' => $row[3],
            'matakuliah' => $row[4],
        ]);
    }
}
