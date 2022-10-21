<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 *
 * @property int $id
 * @property string $resource_id
 * @property string $budget_item_id
 * @property int $year
 * @property int $month
 * @property float $amount
 */
class AdjustedBudgetItem extends Model
{
    protected $table = 'adjusted_budget_item';

    public function getAdjustment(string $resource_id, int $year, int $month, string $budget_item_id): ?float
    {
        $adjustment = $this->where('resource_id', $resource_id)
            ->where('year', $year)
            ->where('month', $month)
            ->where('budget_item_id', $budget_item_id)
            ->first();

        if ($adjustment === null) {
            return null;
        }

        return (float) $adjustment->amount;
    }

    public function getAdjustments(string $resource_id): array
    {
        $result = self::query()
            ->where('resource_id', $resource_id)
            ->get(['year', 'month', 'budget_item_id', 'amount']);

        $adjustments = [];
        foreach ($result as $_adjustment) {
            $adjustments[$_adjustment->budget_item_id][(int) $_adjustment->year][(int) $_adjustment->month] = (float) $_adjustment->amount;
        }

        return $adjustments;
    }
}
