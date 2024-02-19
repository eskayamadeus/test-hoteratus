<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScrapedRoomPriceLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'scraped_room_id',
        'stay_date',
        'price',
        'refundable',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'refundable' => 'boolean',
        'stay_date' => 'datetime',
    ];

    public function scrapedRoom(): BelongsTo
    {
        return $this->belongsTo(ScrapedRoom::class);
    }
}
