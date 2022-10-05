<?php

declare(strict_types=1);

namespace App\Http\Controllers;

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

        $budget = $this->setUpBudget($request);

        return view(
            'home',
            [
                'status' => session()->get('status'),

                'has_accounts' => $budget->hasAccounts(),
                'has_budget' => $budget->hasBudget(),
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

    public function start(Request $request)
    {
        $this->bootstrap($request);

        $currencies_response = $this->api->getCurrencies();
        if ($currencies_response['status'] !== 200) {
            abort(404, 'Cannot fetch the currencies from the API');
        }

        return view(
            'budget.start',
            [
                'currencies' => $currencies_response['content']
            ]
        );
    }
}
