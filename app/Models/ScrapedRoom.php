<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ScrapedRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'scraped_hotel_id',
        'name',
        'bed_types',
        'capacity',
        'extra',
    ];

    protected $casts = [
        'bed_types' => 'array',
        'extra' => 'array',
    ];

    public function scrapedHotel(): BelongsTo
    {
        return $this->belongsTo(ScrapedHotel::class);
    }

    public function roomMapping()
    {
        return $this->hasOne(ScrapedRoomMapping::class);
    }

    public function scrapedRoomPricingLogs(): HasMany
    {
        return $this->hasMany(ScrapedRoomPriceLog::class);
    }
}
