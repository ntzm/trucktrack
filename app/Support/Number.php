<?php

namespace App\Support;

use Illuminate\Support\Str;

abstract class Number
{
    /**
     * @var float|int
     */
    protected $amount;

    /**
     * @var string|null
     */
    protected $prefix;

    /**
     * @var string|null
     */
    protected $suffix;

    /**
     * @param float|int $amount
     */
    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function __toString()
    {
        return $this->prefix.str_replace('.00', '', number_format($this->amount, 2)).$this->suffix;
    }

    /**
     * @return float|int
     */
    public function amount()
    {
        $number = number_format($this->amount, 2, '.', '');

        if (Str::endsWith($number, '.00')) {
            return (int) $number;
        }

        return (float) $number;
    }
}
