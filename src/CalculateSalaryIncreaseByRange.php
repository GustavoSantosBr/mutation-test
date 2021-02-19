<?php

declare(strict_types=1);

namespace Mutation;

final class CalculateSalaryIncreaseByRange extends BaseCalculator
{
    /**
     * @var SalaryRange
     */
    private SalaryRange $salaryRange;

    /**
     * @var FeeOfIncrease
     */
    private FeeOfIncrease $feeOfIncrease;

    public function __construct(SalaryRange $salaryRange, FeeOfIncrease $feeOfIncrease)
    {
        $this->salaryRange = $salaryRange;
        $this->feeOfIncrease = $feeOfIncrease;
    }

    /**
     * @param float $baseSalary
     * @return float
     */
    public function calculate(float $baseSalary): float
    {
        if (($baseSalary >= $this->salaryRange::MEDIUM) && ($baseSalary < $this->salaryRange::HIGH)) {
            $baseSalary += self::calculateIncreaseAmount($baseSalary, $this->feeOfIncrease::MEDIUM_INCREASE);
            return $baseSalary;
        }

        if ($baseSalary <= $this->salaryRange::LOW) {
            $baseSalary += self::calculateIncreaseAmount($baseSalary, $this->feeOfIncrease::MAXIMUM_INCREASE);
            return $baseSalary;
        }

        $baseSalary += self::calculateIncreaseAmount($baseSalary, $this->feeOfIncrease::MINIMUM_INCREASE);
        return $baseSalary;
    }
}