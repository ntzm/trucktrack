<?php

namespace App\Support;

class Money
{
    private $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function __toString(): string
    {
        return '€'.Format::currency($this->amount);
    }

    public function amount(): string
    {
        return Format::currency($this->amount);
    }
}
