<?php
declare(strict_types=1);

namespace App\Actions\Budget\Item;

use App\Actions\Action;
use App\Models\AdjustedBudgetItem;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Reset extends Action
{
    public function __invoke(
        string $resource_id,
        int $year,
        int $month,
        string $budget_item_id
    ): int
    {
        try {
            AdjustedBudgetItem::query()
                ->where('resource_id', '=', $resource_id)
                ->where('year', '=', $year)
                ->where('month', '=', $month)
                ->where('budget_item_id', '=', $budget_item_id)
                ->delete();

            return 204;
        } catch (\Exception $e) {
            $this->message = $e->getMessage();

            return 500;
        }
    }
}