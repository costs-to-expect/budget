<?php

declare(strict_types=1);

namespace App\Service\Budget;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Income extends Item
{
    public function __construct()
    {
        parent::__construct();
    }

    public function category(): string
    {
        return 'Savings';
    }
}
