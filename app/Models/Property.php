<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'user_id',
        'hotel_name',
        'hotel_icon',
        'address',
        'latitude',
        'longitude',
        'currency',
        'post_code',
        'city',
        'state',
        'country',
        'time_zone',
        'contact',
        'email',
        'description',
        'hotel_image_1',
        'hotel_image_2',
        'hotel_image_3',
        'hotel_image_4',
    ];

    public function scopeSearchProperties($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('hotel_name', 'like', '%'.$search.'%')
                ->orWhere('code', 'like', '%'.$search.'%')
                ->orWhere('address', 'like', '%'.$search.'%')
                ->orWhere('longitude', 'like', '%'.$search.'%')
                ->orWhere('latitude', 'like', '%'.$search.'%')
                ->orWhere('email', 'like', '%'.$search.'%')
                ->orWhere('country', 'like', '%'.$search.'%')
                ->orWhere('currency', 'like', '%'.$search.'%')
                ->orWhere('description', 'like', '%'.$search.'%')
                ->orWhere('city', 'like', '%'.$search.'%')
                ->orWhere('state', 'like', '%'.$search.'%')
                ->orWhere('post_code', 'like', '%'.$search.'%');
        });
    }

    public function users(){

      return  $this->belongsTo(User::class);
    }

    public function rooms(){
      return  $this->hasMany(Room::class);
    }

    public function members(){
      return  $this->hasMany(Member::class);
    }


}
