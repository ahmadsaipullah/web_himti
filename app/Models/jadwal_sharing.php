<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal_sharing extends Model
{
    use HasFactory;

    protected $table = 'jadwal_sharings';
    protected $fillable = ['tittle', 'deskripsi', 'jadwal', 'pemateri', 'ruangan', 'image', 'id_kategori'];


    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori', 'id');
    }
}
