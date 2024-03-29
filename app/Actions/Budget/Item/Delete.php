<?php

declare(strict_types=1);

namespace App\Actions\Budget\Item;

use App\Actions\Action;
use App\Models\AdjustedBudgetItem;
use App\Models\PaidBudgetItem;
use App\Service\Api\Service;
use App\Service\Budget\Settings;
use DateTimeImmutable;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Delete extends Action
{
    public function __invoke(
        Service $api,
        string $resource_type_id,
        string $resource_id,
        string $item_id,
        bool $discard = false
    ): int {
        $item_response = $api->budgetItem($resource_type_id, $resource_id, $item_id);
        if ($item_response['status'] !== 200) {
            $this->message = $item_response['content'];

            return $item_response['status'];
        }

        if ($discard === false) {
            $patch_budget_item_response = $api->budgetItemUpdate(
                $resource_type_id,
                $resource_id,
                $item_id,
                [
                    'end_date' => (new DateTimeImmutable('yesterday', app(Settings::class)->dateTimeZone()))->format('Y-m-d'),
                ]
            );

            if ($patch_budget_item_response['status'] === 204) {
                PaidBudgetItem::query()
                    ->where('resource_id', $resource_id)
                    ->where('budget_item_id', $item_id)
                    ->delete();

                AdjustedBudgetItem::query()
                    ->where('resource_id', $resource_id)
                    ->where('budget_item_id', $item_id)
                    ->delete();

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

        $delete_budget_item_response = $api->budgetItemDelete(
            $resource_type_id,
            $resource_id,
            $item_id
        );

        if ($delete_budget_item_response['status'] === 204) {
            PaidBudgetItem::query()
                ->where('resource_id', $resource_id)
                ->where('budget_item_id', $item_id)
                ->delete();

            AdjustedBudgetItem::query()
                ->where('resource_id', $resource_id)
                ->where('budget_item_id', $item_id)
                ->delete();

            return 204;
        }

        $this->message = $delete_budget_item_response['content'];

        return $delete_budget_item_response['status'];
    }
}
