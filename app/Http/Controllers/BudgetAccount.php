<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Service\Budget\Service;
use Illuminate\Http\Request;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class BudgetAccount extends Controller
{
    public function create(Request $request)
    {
        $this->bootstrap($request);

        $budget = new Service();
        if ($request->query('month') !== null && $request->query('year') !== null) {
            $budget->setPagination((int) $request->query('month'), (int) $request->query('year'));
        }
        $budget->setAccounts($this->mock_accounts_data)
            ->setUp();

        foreach ($this->mock_data as $budget_item) {
            $budget->add($budget_item);
        }

        $budget->allocatedItemsToMonths();

        return view(
            'budget.account.create',
            [
                'accounts' => $budget->accounts(),
                'months' => $budget->months(),
                'pagination' => $budget->pagination(),
                'view_end' => $budget->viewEnd(),
            ]
        );
    }
}
