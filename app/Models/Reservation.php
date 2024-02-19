<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function scope($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('hotel_name', 'like', '%'.$search.'%')
                ->orWhere('address_1', 'like', '%'.$search.'%')
                ->orWhere('address_2', 'like', '%'.$search.'%')
                ->orWhere('email', 'like', '%'.$search.'%')
                ->orWhere('country', 'like', '%'.$search.'%')
                ->orWhere('currency', 'like', '%'.$search.'%')
                ->orWhere('description', 'like', '%'.$search.'%')
                ->orWhere('city', 'like', '%'.$search.'%')
                ->orWhere('state', 'like', '%'.$search.'%')
                ->orWhere('post_code', 'like', '%'.$search.'%');
        });
    }
}
