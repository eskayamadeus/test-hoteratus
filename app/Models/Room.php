<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'properties_id',
        'room_name',
        'room_quantity',
        'maximum_occupancy',
        'adult_capacity',
        'children_capacity',
        'number_of_bathrooms',
        'room_size',
        'selling_period',
        'description',
        'status',
    ];

    public function scopeSearchRoom($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('room_name', 'like', '%'.$search.'%')
                ->orWhere('code', 'like', '%'.$search.'%')
                ->orWhere('room_quantity', 'like', '%'.$search.'%')
                ->orWhere('maximum_occupancy', 'like', '%'.$search.'%')
                ->orWhere('adult_capacity', 'like', '%'.$search.'%')
                ->orWhere('children_capacity', 'like', '%'.$search.'%')
                ->orWhere('status', 'like', '%'.$search.'%')
                ->orWhere('number_of_bathrooms', 'like', '%'.$search.'%')
                ->orWhere('room_size', 'like', '%'.$search.'%')
                ->orWhere('selling_period', 'like', '%'.$search.'%')
                ->orWhere('description', 'like', '%'.$search.'%');
        });
    }

    public function properties(){
     return   $this->belongsToMany(Property::class);
    }
    public function amenities(){
        return $this->hasMany(Amenitys::class);
    }

    public function amenities_types(){
        return $this->hasMany(AmenitysType::class);
    }

    public function members(){
       return $this->hasMany(Member::class);
    }

    public function roomMappings()
    {
        return $this->hasMany(ScrapedRoomMapping::class);
    }
}
