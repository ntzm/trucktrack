<?php

namespace App\Support;

class Volume
{
    private $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function __toString(): string
    {
        return Format::number($this->amount).'l';
    }

    public function amount()
    {
        return $this->amount;
    }
}
