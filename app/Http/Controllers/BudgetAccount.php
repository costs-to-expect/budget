<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Budget\Account\Create;
use App\Actions\Budget\Account\SetBalances;
use App\Actions\Budget\Account\Update;
use App\Service\Budget\Settings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class BudgetAccount extends Controller
{
    public function create(Request $request): View
    {
        $this->bootstrap();

        $budget = $this->setUpBudget($request);

        return view(
            'budget.account.create',
            [
                'currency' => $budget->currency(),
                'has_accounts' => $budget->hasAccounts(),
                'has_budget' => $budget->hasBudget(),
                'has_savings_account' => $budget->hasSavingsAccount(),
                'has_paid_items' => $budget->hasPaidItems(),
                'now_visible' => $budget->nowVisible(),

                'accounts' => $budget->accounts(),
                'months' => $budget->months(),
                'pagination' => $budget->paginationParameters(),
                'view_end' => $budget->viewEndPeriod(),
                'projection' => $budget->projection(),

                'max_accounts' => app(Settings::class)->maxAccounts(),

                'requests' => $this->api->requests(),

                'color' => '#'.dechex(random_int(0, 16777215)),
            ]
        );
    }

    public function createProcess(Request $request): RedirectResponse
    {
        $this->bootstrap();

        $action = new Create();
        $result = $action(
            $this->api,
            $this->resource_type_id,
            $this->resource_id,
            $request->only(['name', 'type', 'description', 'currency_id', 'balance', 'color'])
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

    public function setBalances(Request $request): View
    {
        $this->bootstrap();

        $budget = $this->setUpBudget($request);

        return view(
            'budget.account.set-balances',
            [
                'currency' => $budget->currency(),

                'has_accounts' => $budget->hasAccounts(),
                'has_budget' => $budget->hasBudget(),
                'has_savings_account' => $budget->hasSavingsAccount(),
                'has_paid_items' => $budget->hasPaidItems(),
                'now_visible' => $budget->nowVisible(),

                'accounts' => $budget->accounts(),
                'months' => $budget->months(),
                'pagination' => $budget->paginationParameters(),
                'view_end' => $budget->viewEndPeriod(),
                'projection' => $budget->projection(),

                'max_accounts' => app(Settings::class)->maxAccounts(),

                'requests' => $this->api->requests(),
            ]
        );
    }

    public function setBalancesProcess(Request $request): RedirectResponse
    {
        $this->bootstrap();

        $action = new SetBalances();
        $result = $action(
            $this->api,
            $this->resource_type_id,
            $this->resource_id,
            $request->all()
        );

        if ($result === 204) {
            return redirect()->route('home')
                ->with('status', 'balances-updated');
        }

        if ($result === 422) {
            return redirect()
                ->route('budget.account.set-balances')
                ->withInput()
                ->with('validation.errors', $action->getValidationErrors());
        }

        abort($result, $action->getMessage());
    }

    public function update(Request $request, $account_id): View
    {
        $this->bootstrap();

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
                'has_savings_account' => $budget->hasSavingsAccount(),
                'has_paid_items' => $budget->hasPaidItems(),
                'now_visible' => $budget->nowVisible(),

                'accounts' => $budget->accounts(),
                'months' => $budget->months(),
                'pagination' => $budget->paginationParameters(),
                'view_end' => $budget->viewEndPeriod(),
                'projection' => $budget->projection(),

                'account' => $accounts[$account_id],

                'max_accounts' => app(Settings::class)->maxAccounts(),

                'requests' => $this->api->requests(),
            ]
        );
    }

    public function updateProcess(Request $request): RedirectResponse
    {
        $this->bootstrap();

        $action = new Update();
        $result = $action(
            $this->api,
            $this->resource_type_id,
            $this->resource_id,
            $request->route('account_id'),
            $request->only(['name', 'type', 'description', 'balance', 'color'])
        );

        if ($result === 204) {
            return redirect()->route('home')
                ->with('status', 'account-updated');
        }

        if ($result === 422) {
            return redirect()
                ->route('budget.account.update')
                ->withInput()
                ->with('validation.errors', $action->getValidationErrors());
        }

        abort($result, $action->getMessage());
    }
}
