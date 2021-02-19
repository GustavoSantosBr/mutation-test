<?php

declare(strict_types=1);

namespace Mutation;

final class CalculateSalaryIncreaseByPeriod extends BaseCalculator
{
    /**
     * @var PeriodWorked
     */
    private PeriodWorked $periodWorked;

    /**
     * @var FeeOfIncrease
     */
    private FeeOfIncrease $feeOfIncrease;

    public function __construct(PeriodWorked $periodWorked, FeeOfIncrease $feeOfIncrease)
    {
        $this->periodWorked = $periodWorked;
        $this->feeOfIncrease = $feeOfIncrease;
    }

    /**
     * @param float $baseSalary
     * @param int $periodWorked
     * @return float
     */
    public function calculate(float $baseSalary, int $periodWorked): float
    {
        if ($periodWorked >= $this->periodWorked::LONG_PERIOD) {
            $baseSalary += self::calculateIncreaseAmount($baseSalary, $this->feeOfIncrease::MAXIMUM_INCREASE);
            return $baseSalary;
        }

        if ($periodWorked >= $this->periodWorked::MIDDLE_PERIOD) {
            $baseSalary += self::calculateIncreaseAmount($baseSalary, $this->feeOfIncrease::MEDIUM_INCREASE);
            return $baseSalary;
        }

        if ($periodWorked >= $this->periodWorked::SHORT_PERIOD) {
            $baseSalary += self::calculateIncreaseAmount($baseSalary, $this->feeOfIncrease::MINIMUM_INCREASE);
            return $baseSalary;
        }
        return $baseSalary;
    }
}