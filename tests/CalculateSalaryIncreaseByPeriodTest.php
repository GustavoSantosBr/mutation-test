<?php

declare(strict_types=1);

namespace Test;

use Mutation\CalculateSalaryIncreaseByPeriod;
use Mutation\FeeOfIncrease;
use Mutation\PeriodWorked;
use PHPUnit\Framework\TestCase;

class CalculateSalaryIncreaseByPeriodTest extends TestCase
{
    /**
     * @var PeriodWorked
     */
    private PeriodWorked $periodWorked;

    /**
     * @var CalculateSalaryIncreaseByPeriod
     */
    private CalculateSalaryIncreaseByPeriod $calculateSalaryIncreaseByPeriod;

    private const BASE_SALARY = 5000;

    protected function setUp(): void
    {
        parent::setUp();
        $this->periodWorked = self::createMock(PeriodWorked::class);
        $feeOfIncrease = self::createMock(FeeOfIncrease::class);
        $this->calculateSalaryIncreaseByPeriod = new CalculateSalaryIncreaseByPeriod($this->periodWorked, $feeOfIncrease);
    }

    public function testOfSalaryIncreaseWhenPeriodWorkedIsLong(): void
    {
        $salaryWithIncrease = $this
            ->calculateSalaryIncreaseByPeriod
            ->calculate(self::BASE_SALARY, $this->periodWorked::LONG_PERIOD);
        self::assertEquals(5600, $salaryWithIncrease);
    }

    public function testOfSalaryIncreaseWhenPeriodWorkedIsMedium(): void
    {
        $salaryWithIncrease = $this
            ->calculateSalaryIncreaseByPeriod
            ->calculate(self::BASE_SALARY, $this->periodWorked::MIDDLE_PERIOD);
        self::assertEquals(5300, $salaryWithIncrease);
    }

    public function testOfSalaryIncreaseWhenPeriodWorkedIsShort(): void
    {
        $salaryWithIncrease = $this
            ->calculateSalaryIncreaseByPeriod
            ->calculate(self::BASE_SALARY, $this->periodWorked::SHORT_PERIOD);
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