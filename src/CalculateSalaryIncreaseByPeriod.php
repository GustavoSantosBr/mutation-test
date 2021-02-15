<?php

declare(strict_types=1);

namespace Mutation;

final class CalculateSalaryIncreaseByPeriod extends BaseCalculator implements PeriodWorked, FeeOfIncrease
{
    /**
     * @param float $baseSalary
     * @param int $periodWorked
     * @return float
     */
    public function calculate(float $baseSalary, int $periodWorked): float
    {
        if ($periodWorked >= self::LONG_PERIOD) {
            $baseSalary += self::calculateIncreaseAmount($baseSalary, self::MAXIMUM_INCREASE);
            return $baseSalary;
        }

        if ($periodWorked >= self::MIDDLE_PERIOD) {
            $baseSalary += self::calculateIncreaseAmount($baseSalary, self::MEDIUM_INCREASE);
            return $baseSalary;
        }

        if ($periodWorked >= self::SHORT_PERIOD) {
            $baseSalary += self::calculateIncreaseAmount($baseSalary, self::MINIMUM_INCREASE);
            return $baseSalary;
        }
        return $baseSalary;
    }
}