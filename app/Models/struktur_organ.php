<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class struktur_organ extends Model
{
    use HasFactory;

    protected $table = 'struktur_organs';
    protected $fillable = ['nama', 'nim', 'jabatan', 'id_angkatan', 'status', 'image', 'ig', 'twitter', 'fb', 'linkedin'];



    public function angkatan()
    {
        return $this->belongsTo(angkatan::class, 'id_angkatan', 'id');
    }
}
