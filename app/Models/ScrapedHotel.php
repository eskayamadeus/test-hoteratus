<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ScrapedHotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url_id',
        'minimum_stay',
        'channel',
    ];

    public function scrapedRooms(): HasMany
    {
        return $this->hasMany(ScrapedRoom::class);
    }
}
