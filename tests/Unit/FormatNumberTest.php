<?php

namespace Tests\Unit;

use App\Support\Format;
use Tests\TestCase;

class FormatNumberTest extends TestCase
{
    public function testWithNoDecimal()
    {
        $this->assertSame('123', Format::number(123));
    }

    public function testWithOneDecimal()
    {
        $this->assertSame('123.40', Format::number(123.4));
    }

    public function testWithTwoDecimals()
    {
        $this->assertSame('123.45', Format::number(123.45));
    }

    public function testWithMoreThanTwoDecimals()
    {
        $this->assertSame('1.23', Format::number(1.234));
        $this->assertSame('1.24', Format::number(1.235));
        $this->assertSame('1.24', Format::number(1.236));
    }

    public function testWithThousands()
    {
        $this->assertSame('1,234', Format::number(1234));
    }
}
