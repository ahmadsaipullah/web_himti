<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class angkatan extends Model
{
    use HasFactory;

    protected $table = 'angkatans';
    protected $fillable = ['angkatan'];

    public function anggota()
    {
        return $this->hasMany(anggota::class, 'id', 'id_angkatan');
    }

    public function struktur_organ()
    {
        return $this->hasMany(struktur_organ::class, 'id', 'id_angkatan');
    }
}
