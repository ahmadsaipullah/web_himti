<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelompokBelajar extends Model
{
    use HasFactory;

    protected $table = "kelompok_belajars";
    protected $fillable =  ['nim', 'nama', 'email', 'kelas', 'angkatan', 'bidang', 'image'];
}
