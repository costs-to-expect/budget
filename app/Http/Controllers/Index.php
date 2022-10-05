<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Budget\Start;
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

        // Show GBP first
        $currencies = [];
        $currencies[0] = [];
        foreach ($currencies_response['content'] as $currency) {
            if ($currency['code'] === 'GBP') {
                $currencies[0] = $currency;
            } else {
                $currencies[] = $currency;
            }
        }

        return view(
            'budget.start',
            [
                'currencies' => $currencies
            ]
        );
    }

    public function startProcess(Request $request)
    {
        $this->bootstrap($request);

        $action = new Start();
        $result = $action(
            $this->api,
            $this->resource_type_id,
            $this->resource_id,
            $request->only(['name', 'type', 'description', 'currency_id', 'balance'])
        );

        if ($result === 204) {
            return redirect()->route('home')
                ->with('status', 'account-added');
        }

        if ($result === 422) {
            return redirect()
                ->route('start')
                ->withInput()
                ->with('validation.errors', $action->getValidationErrors());
        }

        abort($result, $action->getMessage());
    }
}
