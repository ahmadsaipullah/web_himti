<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danus extends Model
{
    use HasFactory;

    protected $table = 'danuses';
    protected $fillable = ['title', 'image'];
}
