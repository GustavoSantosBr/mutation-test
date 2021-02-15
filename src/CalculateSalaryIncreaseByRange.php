<?php

declare(strict_types=1);

namespace Mutation;

final class CalculateSalaryIncreaseByRange extends BaseCalculator implements FeeOfIncrease, SalaryRange
{
    /**
     * @param float $baseSalary
     * @return float
     */
    public function calculate(float $baseSalary): float
    {
        if (($baseSalary >= self::MEDIUM) && ($baseSalary < self::HIGH)) {
            $baseSalary += self::calculateIncreaseAmount($baseSalary, self::MEDIUM_INCREASE);
            return $baseSalary;
        }

        if ($baseSalary <= self::LOW) {
            $baseSalary += self::calculateIncreaseAmount($baseSalary, self::MAXIMUM_INCREASE);
            return $baseSalary;
        }

        $baseSalary += self::calculateIncreaseAmount($baseSalary, self::MINIMUM_INCREASE);
        return $baseSalary;
    }
}