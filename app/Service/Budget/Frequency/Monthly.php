<?php

declare(strict_types=1);

namespace App\Service\Budget\Frequency;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Monthly extends Period
{
    protected string $type = 'monthly';

    protected string $name = 'Monthly';

    public function __construct(
        private readonly int $day = 15,
        private readonly array $exclusions = []
    ) {
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
