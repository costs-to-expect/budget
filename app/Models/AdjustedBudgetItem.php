<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * https://github.com/costs-to-expect/yahtzee/blob/main/LICENSE
 *
 * @property string $resource_id
 * @property string $budget_item_id
 * @property int $year
 * @property int $month
 * @property float $amount
 */
class AdjustedBudgetItem extends Model
{
    protected $table = 'adjusted_budget_item';
}
