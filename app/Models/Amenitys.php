<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenitys extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'amenity_type_id',
        'description',
        'status',
    ];

    public function amenity_types(){
       return $this->belongsTo(AmenitysType::class);
    }
}
