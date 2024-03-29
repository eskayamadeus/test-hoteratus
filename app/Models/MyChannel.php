<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyChannel extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_name',
        'c_logo',
        'live',
        'status',
    ];
}
