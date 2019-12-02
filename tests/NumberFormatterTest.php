<?php

namespace App\Tests;
use App\Services\NumberFormatter;
use PHPUnit\Framework\TestCase;

class NumberFormatterTest extends TestCase
{
    /**
     * @dataProvider formatterProvider
     */
    public function testFormat($num, $expected): void
    {
        $this->assertEquals($expected, NumberFormatter::format($num));
    }

    public function formatterProvider()
    {
        return [
            [7546354, '7.55M'],
            [7000000, '7.00M'],
            [999500, '1.00M'],
            [535216, '535K'],
            [99950, '100K'],
            [27533.78, '27 534'],
            [533.1, '533.10'],
            [66.6666, '66.67'],
            [12.00, '12'],
            [-12.00, '-12'],
            [-66.6666, '-66.67'],
            [-533.1, '-533.10'],
            [-27533.78, '-27 534'],
            [-99950, '-100K'],
            [-535216, '-535K'],
            [-999500, '-1.00M'],
            [-1000000, '-1.00M'],
            [-2835779, '-2.84M'],
            [999.99, '999.99']
        ];
    }


}