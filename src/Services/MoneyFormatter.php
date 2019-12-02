<?php

namespace App\Services;

use App\Services\NumberFormatter;

class MoneyFormatter
{
    public static function formatEur($number): string
    {
        return NumberFormatter::format($number) . ' €';
    }
    public static function formatUsd($number): string
    {
        return '$' . NumberFormatter::format($number);
    }
}