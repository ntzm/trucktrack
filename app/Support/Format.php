<?php

namespace App\Support;

class Format
{
    public static function number($number): string
    {
        $number = number_format($number, 2);
        $number = str_replace('.00', '', $number);

        return $number;
    }
}
