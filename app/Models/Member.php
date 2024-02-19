<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\PropertyItem;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'user_code',
        'firstname',
        'lastname',
        'email',
        'username',
        'password',
        'role'
    ];

    public function properties(){
        $this->belongsToMany(Property::class);
    }

    public function users(){
        $this->belongsTo(User::class);
    }
}
