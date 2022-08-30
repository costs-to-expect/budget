<?php

declare(strict_types=1);

namespace App\Service\Budget;

use App\Service\Budget\Frequency\Monthly;
use App\Service\Budget\Frequency\Period;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Expense
{
    public function __construct()
    {

    }

    public function active(): bool
    {
        return ($this->startDate() <= now() && now() <= $this->endDate());
    }

    public function amount(): float
    {
        return 0.00;
    }

    public function currencyCode(): string
    {
        return 'GBP';
    }

    public function description(): string
    {
        return 'Expense: Description';
    }

    public function disabled(): bool
    {
        return false;
    }

    public function endDate(): \DateTime
    {
        return new \DateTime('2023-12-31');
    }

    public function frequency(): Period
    {
        return new Monthly(10, [2,3]);
    }

    public function name(): string
    {
        return 'Expense: Name';
    }

    public function startDate(): \DateTime
    {
        return new \DateTime('2021-01-01');
    }
}
