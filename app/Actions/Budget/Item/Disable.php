<?php

declare(strict_types=1);

namespace App\Actions\Budget\Item;

use App\Actions\Action;
use App\Service\Api\Service;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Disable extends Action
{
    public function __invoke(
        Service $api,
        string $resource_type_id,
        string $resource_id,
        string $item_id
    ): int {
        $item_response = $api->budgetItem($resource_type_id, $resource_id, $item_id);
        if ($item_response['status'] !== 200) {
            $this->message = $item_response['content'];

            return $item_response['status'];
        }

        $patch_budget_item_response = $api->budgetItemUpdate(
            $resource_type_id,
            $resource_id,
            $item_id,
            [
                'disabled' => true,
            ]
        );

        if ($patch_budget_item_response['status'] === 204) {
            return 204;
        }

        if ($patch_budget_item_response['status'] === 422) {
            $this->message = $patch_budget_item_response['content'];
            $this->validation_errors = $patch_budget_item_response['fields'];

            return 422;
        }

        $this->message = $patch_budget_item_response['content'];

        return $patch_budget_item_response['status'];
    }
}
