<?php

declare(strict_types=1);

namespace App\Actions\Account;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Reset
{
    public function __invoke(
        string $bearer_token,
        string $resource_type_id,
        string $resource_id
    ): int {
        \App\Jobs\Reset::dispatch(
            $bearer_token,
            $resource_type_id,
            $resource_id
        );

        return 201;
    }
}
