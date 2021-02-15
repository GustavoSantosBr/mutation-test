<?php

declare(strict_types=1);

namespace Test;

use Mutation\CalculateSalaryIncreaseByRange;
use PHPUnit\Framework\TestCase;

class CalculateSalaryIncreaseByRangeTest extends TestCase
{
    /**
     * @var CalculateSalaryIncreaseByRange
     */
    private $calculateSalaryIncreaseByRange;

    protected function setUp(): void
    {
        parent::setUp();
        $this->calculateSalaryIncreaseByRange = new CalculateSalaryIncreaseByRange();
    }

    public function testOfSalaryIncreaseWhenSalaryIsHigh(): void
    {
        $salaryWithIncrease = $this->calculateSalaryIncreaseByRange->calculate(12535.10);
        self::assertEquals(12911.15, $salaryWithIncrease);
    }

    public function testOfSalaryIncreaseWhenTheSalaryIsGreaterThanOrEqualToMediumAndLessThanOrEqualToHigh(): void
    {
        $salaryWithIncrease = $this->calculateSalaryIncreaseByRange->calculate(9000);
        self::assertEquals(9270, $salaryWithIncrease);
    }

    public function testOfSalaryIncreaseWhenTheSalaryIsGreaterThanOrEqualToMedium(): void
    {
        $salaryWithIncrease = $this->calculateSalaryIncreaseByRange->calculate(7000);
        self::assertEquals(7420, $salaryWithIncrease);
    }

    public function testOfSalaryIncreaseWhenSalaryIsMedium(): void
    {
        $salaryWithIncrease = $this->calculateSalaryIncreaseByRange->calculate(5000);
        self::assertEquals(5300, $salaryWithIncrease);
    }

    public function testOfSalaryIncreaseWhenSalaryIsLow(): void
    {
        $salaryWithIncrease = $this->calculateSalaryIncreaseByRange->calculate(1000);
        self::assertEquals(1120, $salaryWithIncrease);
    }
}