<?php

namespace App\Enums;

enum RevenueStrategyApproach: string
{
    case Aggresive = 'aggressive';
    case Moderate = 'moderate';

    public function description(): string
    {
        return match ($this) {
            self::Aggresive => 'Aggressive Rate Approach',
            self::Moderate => 'Moderate Rate Approach',
        };
    }
}
