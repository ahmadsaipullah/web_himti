<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class anggota extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'anggotas';
    protected $fillable = ['nama','nim','email','no_hp','id_angkatan'];


    public function angkatan()
    {
        return $this->belongsTo(angkatan::class,'id_angkatan','id');
    }
}
