<?php


namespace App\Tests;

use App\Services\NumberFormatter;
use App\Services\MoneyFormatter;
use PHPUnit\Framework\TestCase;


class MoneyFormatterTest extends TestCase
{
    private $sut;
    public function setUp(): void
    {
        $this->sut =  new MoneyFormatter($this->getNumberFormatterMock());
    }

    private function getNumberFormatterMock()
    {
        return $this->getMockBuilder(NumberFormatter::class)
            ->getMock();
    }

    /**
     * @dataProvider eurProvider
     */
    public function testIfEurSignAdded($number, $expected)
    {
        $this->assertEquals($this->sut->formatEur($number), $expected);
    }

    /**
     * @dataProvider usdProvider
     * @param $number
     * @param $expected
     */
    public function testIfUsdSignAdded($number, $expected)
    {
        $this->assertEquals($this->sut->formatUsd($number), $expected);
    }



    public function usdProvider(): array
    {
        return [
            [2835779, "$2.84M"],
            [-2835779, "$-2.84M"],
            [945600, "$946K"],
            [999.99, "$999.99"],
            [-66.6666, "$-66.67"],
        ];
    }

    public function eurProvider(): array
    {
        return [
            [2835779, "2.84M €"],
            [-2835779, "-2.84M €"],
            [945600, "946K €"],
            [999.99, "999.99 €"],
            [-66.6666, "-66.67 €"],
        ];
    }
}