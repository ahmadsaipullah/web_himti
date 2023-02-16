<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sertifikat extends Model
{
    use HasFactory;

    protected $table = 'sertifikats';
    protected $fillable = ['qrcode', 'nama_peserta', 'nim'];
}
