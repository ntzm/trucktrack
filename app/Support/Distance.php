<?php

namespace App\Support;

class Distance
{
    private $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function __toString(): string
    {
        return Format::number($this->amount).'km';
    }

    public function amount()
    {
        return $this->amount;
    }
}
