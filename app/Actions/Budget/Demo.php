<?php

declare(strict_types=1);

namespace App\Actions\Budget;

use App\Actions\Action;
use App\Jobs\LoadDemo;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Demo extends Action
{
    public function __invoke(
        string $resource_type_id,
        string $resource_id,
        string $bearer_id,
        string $currency_id
    ): int {
        LoadDemo::dispatch($resource_type_id, $resource_id, $bearer_id, $currency_id);

        return 201;
    }
}
