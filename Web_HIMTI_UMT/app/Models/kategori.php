<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kategori extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'kategoris';
    protected $fillable = ['nama_kategori'];

    public function acara()
    {
        return $this->hasMany(acara::class,'id', 'id_kategori');
    }

    public function artikel()
    {
        return $this->hasMany(artikel::class,'id', 'id_kategori');
    }

    public function jadwal_sharing()
    {
        return $this->hasMany(jadwal_sharing::class,'id', 'id_kategori');
    }
}
