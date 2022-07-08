<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class jadwal_sharing extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'jadwal_sharings';
    protected $fillable = ['tittle','deskripsi','jadwal','image','id_kategori'];




    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori','id');
    }
}
