<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 *
 * @property string $resource_id
 * @property int $year
 * @property int $month
 * @property string $budget_item_id
 */
class PaidBudgetItem extends Model
{
    protected $table = 'paid_budget_item';

    public function getPaidBudgetItems(string $resource_id, int $year, int $month): array
    {
        $result = self::query()
            ->where('resource_id', $resource_id)
            ->where('year', $year)
            ->where('month', $month)
            ->get('budget_item_id');

        $paid = [];
        foreach ($result as $paid_budget_item) {
            $paid[] = $paid_budget_item->budget_item_id;
        }

        return $paid;
    }
}
