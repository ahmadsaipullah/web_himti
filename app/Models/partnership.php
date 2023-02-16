<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class partnership extends Model
{
    use HasFactory;

    protected $table = 'partnerships';
    protected $fillable = ['nama', 'perusahaan', 'image'];
}
