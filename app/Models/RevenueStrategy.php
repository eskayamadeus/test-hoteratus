<?php

namespace App\Models;

use App\Enums\RevenueStrategyApproach;
use App\Enums\RevenueStrategyIncrementType;
use App\Enums\RevenueStrategyValueType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevenueStrategy extends Model
{
    use HasFactory;

    protected $fillable = [
        'channel',
        'approach',
        'increment_type',
        'value_type',
        'value',
    ];

    protected $casts = [
        'value' => 'decimal:2',
        'approach' => RevenueStrategyApproach::class,
        'increment_type' => RevenueStrategyIncrementType::class,
        'value_type' => RevenueStrategyValueType::class,
    ];

    public function calculateNewRate($rate): float|int
    {
        return $this->increment_type->calculateValue($rate, $this->value_type->calculateValue($rate, $this->value));
    }
}
