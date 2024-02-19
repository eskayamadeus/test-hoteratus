<?php

namespace App\Enums;

enum RevenueStrategyValueType: string
{
    case Percent = 'percent';
    case Fixed = 'fixed';

    public function description(): string
    {
        return match ($this) {
            self::Percent => 'Percent (%)',
            self::Fixed => 'Fixed Value',
        };
    }

    public function calculateValue(float|int $amount, float|int $rate): float|int
    {
        return match ($this) {
            self::Percent => ($rate / 100) * $amount,
            self::Fixed => $rate,
        };
    }
}
