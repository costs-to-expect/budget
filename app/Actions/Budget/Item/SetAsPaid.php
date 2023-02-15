<?php

declare(strict_types=1);

namespace App\Actions\Budget\Item;

use App\Actions\Action;
use App\Models\PaidBudgetItem;
use Exception;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class SetAsPaid extends Action
{
    public function __invoke(
        string $resource_id,
        int $year,
        int $month,
        string $budget_item_id
    ): int {
        $model = new PaidBudgetItem();
        $model->resource_id = $resource_id;
        $model->year = $year;
        $model->month = $month;
        $model->budget_item_id = $budget_item_id;

        try {
            $model->save();

            return 201;
        } catch (Exception $e) {
            $this->message = $e->getMessage();

            return 500;
        }
    }
}
