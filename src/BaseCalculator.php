<?php

declare(strict_types=1);

namespace Mutation;

abstract class BaseCalculator
{
    /**
     * @param float $baseSalary
     * @param float $fee
     * @return float
     */
    protected function calculateIncreaseAmount(float $baseSalary, float $fee): float
    {
        return round(($baseSalary / 100) * $fee, 2);
    }
}