<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anggota extends Model
{
    use HasFactory;

    protected $table = 'anggotas';
    protected $fillable = ['nama', 'nim', 'email', 'no_hp', 'no_darurat', 'alamat', 'id_angkatan'];


    public function angkatan()
    {
        return $this->belongsTo(angkatan::class, 'id_angkatan', 'id');
    }
}
