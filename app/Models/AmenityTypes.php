<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmenitysType extends Model
{
    use HasFactory;

    public function amenitys(){
       return  $this->hasMany(Amenitys::class);
    }
}
