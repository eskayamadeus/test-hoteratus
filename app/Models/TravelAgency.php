<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelAgency extends Model
{
    use HasFactory;

    protected $fillable = [
        'tname',
        'categories',
        'subcategories',
        'dchannel',
        'commission',
        'value',
        'description',

    ];
}
