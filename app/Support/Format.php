<?php

namespace App\Support;

class Format
{
    public static function number($number): string
    {
        return str_replace('.00', '', number_format($number, 2));
    }
}
