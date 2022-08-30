<?php

declare(strict_types=1);

namespace App\Service\Budget\Frequency;

use JetBrains\PhpStorm\ArrayShape;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Monthly extends Period
{
    private int $day;
    private array $exclusions;

    protected string $type = 'monthly';

    public function __construct(
        int $day = 10,
        array $exclusions = []
    )
    {
        $this->day = $day;
        $this->exclusions = $exclusions;
    }

    public function day(): int
    {
        return $this->day;
    }

    public function exclusions(): array
    {
        return $this->exclusions;
    }
}
