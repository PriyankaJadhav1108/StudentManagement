<?php

namespace StudentManagement\Tests;

use PHPUnit\Framework\TestCase;
use StudentManagement\Calculator;

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    public function testAddition()
    {
        $result = $this->calculator->add(5, 3);
        $this->assertEquals(8, $result);
    }

    public function testSubtraction()
    {
        $result = $this->calculator->subtract(10, 4);
        $this->assertEquals(6, $result);
    }

    public function testMultiplication()
    {
        $result = $this->calculator->multiply(6, 7);
        $this->assertEquals(42, $result);
    }

    public function testDivision()
    {
        $result = $this->calculator->divide(15, 3);
        $this->assertEquals(5, $result);
    }

    public function testDivisionByZero()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Division by zero");

        $this->calculator->divide(10, 0);
    }

    public function additionProvider()
    {
        return [
            [1, 2, 3],
            [0, 0, 0],
            [-1, 1, 0],
            [10, -5, 5],
        ];
    }

    #[DataProvider('additionProvider')]
    public function testAdditionWithDataProvider($a, $b, $expected)
    {
        $result = $this->calculator->add($a, $b);
        $this->assertEquals($expected, $result);
    }
}