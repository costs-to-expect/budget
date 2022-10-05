<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Budget\Account\Create;
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

        $budget = $this->setUpBudget($request);

        return view(
            'budget.account.create',
            [
                'currency' => $budget->currency(),
                'has_accounts' => $budget->hasAccounts(),
                'has_budget' => $budget->hasBudget(),
                'accounts' => $budget->accounts(),
                'months' => $budget->months(),
                'pagination' => $budget->paginationParameters(),
                'view_end' => $budget->viewEndPeriod(),
                'projection' => $budget->projection(),

                'max_accounts' => $budget->maxAccounts(),
            ]
        );
    }

    public function createProcess(Request $request)
    {
        $this->bootstrap($request);

        $action = new Create();
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
                ->route('budget.account.create')
                ->withInput()
                ->with('validation.errors', $action->getValidationErrors());
        }

        abort($result, $action->getMessage());
    }

    public function update(Request $request, $account_id)
    {
        $this->bootstrap($request);

        $budget = $this->setUpBudget($request);

        $accounts = $budget->accounts();
        if (array_key_exists($account_id, $accounts) === false) {
            abort(404);
        }

        return view(
            'budget.account.update',
            [
                'currency' => $budget->currency(),
                'has_accounts' => $budget->hasAccounts(),
                'has_budget' => $budget->hasBudget(),
                'accounts' => $budget->accounts(),
                'months' => $budget->months(),
                'pagination' => $budget->paginationParameters(),
                'view_end' => $budget->viewEndPeriod(),
                'projection' => $budget->projection(),

                'account' => $accounts[$account_id],

                'max_accounts' => $budget->maxAccounts(),
            ]
        );
    }
}
