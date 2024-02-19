<?php

namespace App\Enums;

use Illuminate\Support\Arr;

enum RevenueStrategyIncrementType: string
{
    case Increase = 'increase';
    case Decrease = 'decrease';

    public function description(): string
    {
        return match ($this) {
            self::Increase => 'Increase (+)',
            self::Decrease => 'Decrease (-)',
        };
    }

    public function calculateValue(float|int ...$values): float|int
    {
        return match ($this) {
            self::Increase => array_reduce($values, fn ($value, $currentValue) => $value + $currentValue, 0),
            self::Decrease => array_reduce(Arr::except($values, 0), fn ($value, $currentValue) => $value - $currentValue, $values[0]),
        };
    }
}
