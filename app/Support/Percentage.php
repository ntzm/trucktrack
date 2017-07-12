<?php

namespace App\Support;

use InvalidArgumentException;

class Percentage extends Number
{
    protected $suffix = '%';

    public function __construct($amount)
    {
        if ($amount < 0 || $amount > 100) {
            throw new InvalidArgumentException('Amount must be between 0 and 100');
        }

        parent::__construct($amount);

        $this->amount = $amount;
    }
}
