<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class acara extends Model
{
    use HasFactory;

    protected $table = 'acaras';
    protected $fillable = ['tittle', 'deskripsi', 'image', 'jadwal', 'pengisi_acra', 'lokasi', 'id_kategori'];

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori', 'id');
    }
}
