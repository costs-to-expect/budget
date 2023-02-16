<?php

declare(strict_types=1);

namespace App\Service\Budget\Frequency;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
abstract class Period
{
    protected string $type;

    protected string $name;

    public function type(): string
    {
        return $this->type;
    }
}
