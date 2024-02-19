<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScrapedRoomMapping extends Model
{
    use HasFactory;

    protected $fillable = [
        'scraped_room_id',
        'room_id',
    ];

    public function scrapedRoom(): BelongsTo
    {
        return $this->belongsTo(ScrapedRoom::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
