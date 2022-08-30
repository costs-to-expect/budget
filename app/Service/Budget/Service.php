<?php

declare(strict_types=1);

namespace App\Service\Budget;

use JetBrains\PhpStorm\ArrayShape;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Service
{
    public function __construct()
    {

    }

    public function currentMonth(): int
    {
        return (int) date('n');
    }

    public function endMonth(): int
    {
        return (int) now()->addMonths($this->numberOfVisibleMonths())->format('n');
    }

    #[ArrayShape([
        'year' => "integer",
        'month' => "integer",
        'days' => "integer",
        'leap_year' => "boolean",
    ])]
    public function months(): array
    {
        $months = [];
        for ($i = 0; $i <= $this->numberOfVisibleMonths(); $i++) {
            $months[] = [
                'year' => (int) now()->addMonths($i)->format('Y'),
                'month' => (int) now()->addMonths($i)->format('n'),
                'days' => (int) now()->addMonths($i)->format('t'),
                'leap_year' => (bool) now()->addMonths($i)->format('L'),
            ];
        }

        return $months;
    }

    public function numberOfVisibleMonths(): int
    {
        return 3;
    }
}
