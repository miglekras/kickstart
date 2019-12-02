<?php

namespace App\Services;

class NumberFormatter
{
    public static function format($n)
    {
        $absNum = abs($n);
        if ($absNum >= 999500) {
            $num = round(($n / 1000000), 2);
            return number_format($num, 2, '.', '') . 'M';
        } elseif ($absNum >= 99950 && $absNum < 999500) {
            return round($n / 1000) . 'K';
        } elseif ($absNum >= 1000 && $absNum < 99950) {
            $num = round($n);
            return number_format($num, 0, '.', ' ');
        } elseif ($absNum < 1000 && $absNum >= 0) {
            $num = round($n, 2);
            return $num;
        }
    }
}
