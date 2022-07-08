<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class acara extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'acaras';
    protected $fillable = ['tittle','deskripsi','image','id_kategori',];

    public function kategori()
    {
        return $this->belongsTo(kategori::class,'id_kategori','id');
    }


}
