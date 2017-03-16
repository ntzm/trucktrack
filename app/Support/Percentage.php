<?php

namespace App\Support;

use InvalidArgumentException;

class Percentage
{
    private $amount;

    public function __construct($amount)
    {
        if ($amount < 0 || $amount > 100) {
            throw new InvalidArgumentException('Amount must be between 0 and 100');
        }

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
