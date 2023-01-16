<?php

declare(strict_types=1);

namespace App\Service\Budget\Frequency;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class OneOff extends Period
{
    protected string $type = 'one-off';
    protected string $name = 'One-Off';

    public function __construct(
        private readonly int $month
    )
    {
    }

    public function month(): int
    {
        return $this->month;
    }
}
