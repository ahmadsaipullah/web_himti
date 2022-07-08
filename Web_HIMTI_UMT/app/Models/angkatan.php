<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class angkatan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'angkatans';
    protected $fillable = ['angkatan'];

    public function anggota()
    {
        return $this->hasMany(anggota::class,'id', 'id_angkatan');
    }
}
