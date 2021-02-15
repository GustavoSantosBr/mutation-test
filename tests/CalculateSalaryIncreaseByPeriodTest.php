<?php

declare(strict_types=1);

namespace Test;

use Mutation\CalculateSalaryIncreaseByPeriod;
use PHPUnit\Framework\TestCase;

class CalculateSalaryIncreaseByPeriodTest extends TestCase
{
    /**
     * @var CalculateSalaryIncreaseByPeriod
     */
    private $calculateSalaryIncreaseByPeriod;

    private const BASE_SALARY = 5000;

    protected function setUp(): void
    {
        parent::setUp();
        $this->calculateSalaryIncreaseByPeriod = new CalculateSalaryIncreaseByPeriod();
    }

    public function testOfSalaryIncreaseWhenPeriodWorkedIsLong(): void
    {
        $salaryWithIncrease = $this
            ->calculateSalaryIncreaseByPeriod
            ->calculate(self::BASE_SALARY, $this->calculateSalaryIncreaseByPeriod::LONG_PERIOD);
        self::assertEquals(5600, $salaryWithIncrease);
    }

    public function testOfSalaryIncreaseWhenPeriodWorkedIsMedium(): void
    {
        $salaryWithIncrease = $this
            ->calculateSalaryIncreaseByPeriod
            ->calculate(self::BASE_SALARY, $this->calculateSalaryIncreaseByPeriod::MIDDLE_PERIOD);
        self::assertEquals(5300, $salaryWithIncrease);
    }

    public function testOfSalaryIncreaseWhenPeriodWorkedIsShort(): void
    {
        $salaryWithIncrease = $this
            ->calculateSalaryIncreaseByPeriod
            ->calculate(self::BASE_SALARY, $this->calculateSalaryIncreaseByPeriod::SHORT_PERIOD);
        self::assertEquals(5150, $salaryWithIncrease);
    }

    public function testOfSalaryIncreaseWhenTheIncreaseIsNotApplicable(): void
    {
        $salaryWithIncrease = $this
            ->calculateSalaryIncreaseByPeriod
            ->calculate(self::BASE_SALARY, 3);
        self::assertEquals(self::BASE_SALARY, $salaryWithIncrease);
    }
}