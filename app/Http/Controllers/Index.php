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
class Index extends Controller
{
    public function home(Request $request)
    {
        $this->bootstrap($request);

        //$budget_items = $this->getBudgetItems();

        $budget = new Service();
        if ($request->query('month') !== null && $request->query('year') !== null) {
            $budget->setPagination((int) $request->query('month'), (int) $request->query('year'));
        }
        $budget->setAccounts($this->accounts)
            ->create();

        foreach ($this->mock_data as $budget_item) {
            $budget->addItem($budget_item);
        }

        $budget->assignItemsToBudget();

        return view(
            'home',
            [
                'status' => session()->get('status'),
                'accounts' => $budget->accounts(),
                'months' => $budget->months(),
                'pagination' => $budget->paginationParameters(),
                'view_end' => $budget->viewEndPeriod(),
                'projection' => $budget->projection(),
            ]
        );
    }

    public function landing()
    {
        return view('landing');
    }
}
