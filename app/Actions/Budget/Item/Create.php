<?php
declare(strict_types=1);

namespace App\Actions\Budget\Item;

use App\Actions\Action;
use App\Api\Service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Create extends Action
{
    public function __invoke(
        Service $api,
        string $resource_type_id,
        string $resource_id,
        array $input
    ): int
    {
        // Validate the fields for frequency, need to be correct
        // Return validation error and manual 422 with input

        // We need to structure the $payload from the given input
        // Do it here for now, we will probably offload it to a separate class

        $create_budget_item_response = $api->createBudgetItem(
            $resource_type_id,
            $resource_id,
            $input
        );

        if ($create_budget_item_response['status'] === 201) {
            return 201;
        }

        if ($create_budget_item_response['status'] === 422) {
            $this->message = $create_budget_item_response['content'];
            $this->validation_errors = $create_budget_item_response['fields'];
            return 422;
        }

        return $create_budget_item_response['status'];
    }
}
