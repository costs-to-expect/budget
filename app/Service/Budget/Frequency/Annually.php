<?php

declare(strict_types=1);

namespace App\Service\Budget\Frequency;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Annually extends Period
{
    protected string $type = 'annually';
    protected string $name = 'Annually';

    public function __construct(
        private readonly int $day,
        private readonly int $month
    )
    {
    }

    public function day(): int
    {
        return $this->day;
    }

    public function month(): int
    {
        return $this->month;
    }
}
