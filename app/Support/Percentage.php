<?php

namespace App\Support;

class Percentage
{
    private $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function __toString(): string
    {
        return Format::number($this->amount).'%';
    }

    public function amount(): string
    {
        return Format::number($this->amount);
    }
}
