<?php

declare(strict_types=1);

namespace App\Service\Budget\Frequency;

use JetBrains\PhpStorm\ArrayShape;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Annually extends Period
{
    private int $day;
    private int $month;

    protected string $type = 'annually';

    public function __construct(int $day, int $month)
    {
        $this->day = $day;
        $this->month = $month;
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
