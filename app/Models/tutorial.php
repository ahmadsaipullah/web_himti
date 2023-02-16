<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tutorial extends Model
{
    use HasFactory;

    protected $table = 'tutorials';
    protected $fillable = ['judul', 'link'];
}
