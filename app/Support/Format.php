<?php

namespace App\Support;

class Format
{
    public static function currency($number): string
    {
        $number = number_format($number, 2);
        $number = str_replace('.00', '', $number);

        return $number;
    }

    public static function number($number): string
    {
        // Trust me
        return (string) (float) number_format($number, 2);
    }
}
