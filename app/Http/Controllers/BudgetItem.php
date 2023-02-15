<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Budget\Item\Adjust;
use App\Actions\Budget\Item\Create;
use App\Actions\Budget\Item\Delete;
use App\Actions\Budget\Item\Disable;
use App\Actions\Budget\Item\Enable;
use App\Actions\Budget\Item\Reset;
use App\Actions\Budget\Item\Restore;
use App\Actions\Budget\Item\SetAsNotPaid;
use App\Actions\Budget\Item\SetAsPaid;
use App\Actions\Budget\Item\Update;
use App\Models\AdjustedBudgetItem;
use App\Service\Budget\Settings;
use DateTimeImmutable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class BudgetItem extends Controller
{
    public function adjustProcess(Request $request): RedirectResponse
    {
        $this->bootstrap();

        $action = new Adjust();
        $result = $action(
            $this->resource_id,
            (int) $request->route('item_year'),
            (int) $request->route('item_month'),
            $request->route('item_id'),
            $request->only(['amount'])
        );

        if ($result === 201) {
            return redirect()
                ->route(
                    'budget.item.view',
                    [
                        'item_id' => $request->route('item_id'),
                        'item-year' => (int) $request->route('item_year'),
                        'item-month' => (int) $request->route('item_month'),
                    ]
                )
                ->with('status', 'item-adjusted');
        }

        abort($result, $action->getMessage());
    }

    public function confirmDelete(Request $request): View
    {
        $this->bootstrap();

        $budget = $this->setUpBudget($request);

        $budget_item = $this->api->budgetItem(
            $this->resource_type_id,
            $this->resource_id,
            $request->route('item_id')
        );

        if ($budget_item['status'] !== 200) {
            abort($budget_item['status'], $budget_item['content']);
        }

        $item_year = (int) $request->query('item-year', $budget->nowYear());
        $item_month = (int) $request->query('item-month', $budget->nowMonth());

        $adjusted_amount = (new AdjustedBudgetItem())->getAdjustment(
            $this->resource_id,
            $item_year,
            $item_month,
            $request->route('item_id')
        );

        return view(
            'budget.item.confirm-delete',
            [
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

                'item' => $budget_item['content'],
                'adjusted_amount' => $adjusted_amount,

                'selected_now_month' => $request->query('month', $budget->nowMonth()),
                'selected_now_year' => $request->query('year', $budget->nowYear()),

                'item_year' => (int) $request->query('item-year', $budget->nowYear()),
                'item_month' => (int) $request->query('item-month', $budget->nowMonth()),

                'requests' => $this->api->requests(),
            ]
        );
    }

    public function confirmDeleteProcess(Request $request): RedirectResponse
    {
        $this->bootstrap();

        $action = new Delete();
        $result = $action(
            $this->api,
            $this->resource_type_id,
            $this->resource_id,
            $request->route('item_id'),
            $request->post('submit_and_discard') !== null
        );

        if ($result === 204) {
            return redirect()
                ->route('home')
                ->with('status', 'item-deleted');
        }

        if ($result === 422) {
            return redirect()
                ->route('budget.item.confirm-delete', ['item_id' => $request->route('item_id')])
                ->withInput()
                ->with('validation.errors', $action->getValidationErrors());
        }

        abort($result, $action->getMessage());
    }

    public function confirmDisable(Request $request): View
    {
        $this->bootstrap();

        $budget = $this->setUpBudget($request);

        $budget_item = $this->api->budgetItem(
            $this->resource_type_id,
            $this->resource_id,
            $request->route('item_id')
        );

        if ($budget_item['status'] !== 200) {
            abort($budget_item['status'], $budget_item['content']);
        }

        $item_year = (int) $request->query('item-year', $budget->nowYear());
        $item_month = (int) $request->query('item-month', $budget->nowMonth());

        $adjusted_amount = (new AdjustedBudgetItem())->getAdjustment(
            $this->resource_id,
            $item_year,
            $item_month,
            $request->route('item_id')
        );

        return view(
            'budget.item.confirm-disable',
            [
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

                'item' => $budget_item['content'],
                'adjusted_amount' => $adjusted_amount,

                'selected_now_month' => $request->query('month', $budget->nowMonth()),
                'selected_now_year' => $request->query('year', $budget->nowYear()),

                'item_year' => (int) $request->query('item-year', $budget->nowYear()),
                'item_month' => (int) $request->query('item-month', $budget->nowMonth()),

                'requests' => $this->api->requests(),
            ]
        );
    }

    public function confirmDisableProcess(Request $request): RedirectResponse
    {
        $this->bootstrap();

        $action = new Disable();
        $result = $action(
            $this->api,
            $this->resource_type_id,
            $this->resource_id,
            $request->route('item_id')
        );

        if ($result === 204) {
            if ($request->query('return') === 'list') {
                return redirect()
                    ->route('budget.item.list', ['item_id' => $request->route('item_id')])
                    ->with('status', 'item-disabled');
            }

            return redirect()
                ->route('budget.item.view', ['item_id' => $request->route('item_id')])
                ->with('status', 'item-disabled');
        }

        if ($result === 422) {
            return redirect()
                ->route('budget.item.confirm-disable', ['item_id' => $request->route('item_id')])
                ->withInput()
                ->with('validation.errors', $action->getValidationErrors());
        }

        abort($result, $action->getMessage());
    }

    public function confirmEnable(Request $request): View
    {
        $this->bootstrap();

        $budget = $this->setUpBudget($request);

        $budget_item = $this->api->budgetItem(
            $this->resource_type_id,
            $this->resource_id,
            $request->route('item_id')
        );

        if ($budget_item['status'] !== 200) {
            abort($budget_item['status'], $budget_item['content']);
        }

        $item_year = (int) $request->query('item-year', $budget->nowYear());
        $item_month = (int) $request->query('item-month', $budget->nowMonth());

        $adjusted_amount = (new AdjustedBudgetItem())->getAdjustment(
            $this->resource_id,
            $item_year,
            $item_month,
            $request->route('item_id')
        );

        return view(
            'budget.item.confirm-enable',
            [
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

                'item' => $budget_item['content'],
                'adjusted_amount' => $adjusted_amount,

                'selected_now_month' => $request->query('month', $budget->nowMonth()),
                'selected_now_year' => $request->query('year', $budget->nowYear()),

                'item_year' => (int) $request->query('item-year', $budget->nowYear()),
                'item_month' => (int) $request->query('item-month', $budget->nowMonth()),

                'requests' => $this->api->requests(),
            ]
        );
    }

    public function confirmEnableProcess(Request $request): RedirectResponse
    {
        $this->bootstrap();

        $action = new Enable();
        $result = $action(
            $this->api,
            $this->resource_type_id,
            $this->resource_id,
            $request->route('item_id')
        );

        if ($result === 204) {
            if ($request->query('return') === 'list') {
                return redirect()
                    ->route('budget.item.list', ['item_id' => $request->route('item_id')])
                    ->with('status', 'item-enabled');
            }

            return redirect()
                    ->route('budget.item.view', ['item_id' => $request->route('item_id')])
                    ->with('status', 'item-enabled');
        }

        if ($result === 422) {
            return redirect()
                ->route('budget.item.confirm-enable', ['item_id' => $request->route('item_id')])
                ->withInput()
                ->with('validation.errors', $action->getValidationErrors());
        }

        abort($result, $action->getMessage());
    }

    private function create(Request $request, string $view)
    {
        $this->bootstrap();

        $budget = $this->setUpBudget($request);

        return view(
            $view,
            [
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

                'currency' => $budget->currency(),

                'max_items' => app(Settings::class)->maxItems(),
                'number_of_items' => $budget->numberOfItems(),

                'requests' => $this->api->requests(),
            ]
        );
    }

    public function createExpense(Request $request)
    {
        return $this->create($request, 'budget.item.create-expense');
    }

    public function createIncome(Request $request)
    {
        return $this->create($request, 'budget.item.create-income');
    }

    public function createSaving(Request $request)
    {
        return $this->create($request, 'budget.item.create-saving');
    }

    public function createExpenseProcess(Request $request): RedirectResponse
    {
        $this->bootstrap();

        $action = new Create();
        $result = $action(
            $this->api,
            $this->resource_type_id,
            $this->resource_id,
            $request->all()
        );

        if ($result === 201) {
            if (array_key_exists('submit_and_return', $request->all())) {
                return redirect()
                    ->route('budget.item.create-expense');
            }

            return redirect()
                ->route('home')
                ->with('status', 'item-added');
        }

        if ($result === 422) {
            return redirect()
                ->route('budget.item.create-expense')
                ->withInput()
                ->with('validation.errors', $action->getValidationErrors());
        }

        abort($result, $action->getMessage());
    }

    public function createIncomeProcess(Request $request): RedirectResponse
    {
        $this->bootstrap();

        $action = new Create();
        $result = $action(
            $this->api,
            $this->resource_type_id,
            $this->resource_id,
            $request->all()
        );

        if ($result === 201) {
            if (array_key_exists('submit_and_return', $request->all())) {
                return redirect()
                    ->route('budget.item.create-income');
            }

            return redirect()
                ->route('home')
                ->with('status', 'item-added');
        }

        if ($result === 422) {
            return redirect()
                ->route('budget.item.create-income')
                ->withInput()
                ->with('validation.errors', $action->getValidationErrors());
        }

        abort($result, $action->getMessage());
    }

    public function createSavingProcess(Request $request): RedirectResponse
    {
        $this->bootstrap();

        $action = new Create();
        $result = $action(
            $this->api,
            $this->resource_type_id,
            $this->resource_id,
            $request->all()
        );

        if ($result === 201) {
            if (array_key_exists('submit_and_return', $request->all())) {
                return redirect()
                    ->route('budget.item.create-saving');
            }

            return redirect()
                ->route('home')
                ->with('status', 'item-added');
        }

        if ($result === 422) {
            return redirect()
                ->route('budget.item.create-saving')
                ->withInput()
                ->with('validation.errors', $action->getValidationErrors());
        }

        abort($result, $action->getMessage());
    }

    public function index(Request $request): View
    {
        $this->bootstrap();

        $budget = $this->setUpBudget($request);

        $budget_item = $this->api->budgetItem(
            $this->resource_type_id,
            $this->resource_id,
            $request->route('item_id')
        );

        if ($budget_item['status'] !== 200) {
            abort($budget_item['status'], $budget_item['content']);
        }

        $action = $request->query('action');
        $item_year = (int) $request->query('item-year', $budget->nowYear());
        $item_month = (int) $request->query('item-month', $budget->nowMonth());

        $adjust_date = null;
        if ($action === 'adjust') {
            $adjust_date = (new DateTimeImmutable("{$item_year}-{$item_month}-01", app(Settings::class)->dateTimeZone()))->setTime(7, 1);
            $adjust_date = $adjust_date->format('F Y');
        }

        $adjusted_amount = (new AdjustedBudgetItem())->getAdjustment(
            $this->resource_id,
            $item_year,
            $item_month,
            $request->route('item_id')
        );

        return view(
            'budget.item.index',
            [
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

                'now_month' => $budget->nowMonth(),
                'now_year' => $budget->nowYear(),
                'is_paid' => in_array($request->route('item_id'), $budget->paidItems(), true),

                'selected_now_month' => $request->query('month', $budget->nowMonth()),
                'selected_now_year' => $request->query('year', $budget->nowYear()),

                'item' => $budget_item['content'],
                'adjusted_amount' => $adjusted_amount,

                'item_year' => $item_year,
                'item_month' => $item_month,

                'action' => $action,
                'adjust_date' => $adjust_date,

                'requests' => $this->api->requests(),
            ]
        );
    }

    public function list(Request $request): View
    {
        $this->bootstrap();

        $budget = $this->setUpBudget($request);

        return view(
            'budget.item.list',
            [
                'accounts' => $budget->accounts(),
                'items' => $this->budget_items,
                'now_year' => $budget->nowYear(),
                'now_month' => $budget->nowMonth(),
                'max_items' => app(Settings::class)->maxItems(),
                'number_of_items' => $budget->numberOfItems(),

                'requests' => $this->api->requests(),
            ]
        );
    }

    public function resetProcess(Request $request): RedirectResponse
    {
        $this->bootstrap();

        $action = new Reset();
        $result = $action(
            $this->resource_id,
            (int) $request->route('item_year'),
            (int) $request->route('item_month'),
            $request->route('item_id')
        );

        if ($result === 204) {
            return redirect()
                ->route(
                    'budget.item.view',
                    [
                        'item_id' => $request->route('item_id'),
                        'item-year' => (int) $request->route('item_year'),
                        'item-month' => (int) $request->route('item_month'),
                    ]
                )
                ->with('status', 'item-reset');
        }

        abort($result, $action->getMessage());
    }

    public function restoreProcess(Request $request): RedirectResponse
    {
        $this->bootstrap();

        $action = new Restore();
        $result = $action(
            $this->api,
            $this->resource_type_id,
            $this->resource_id,
            $request->route('item_id')
        );

        if ($result === 204) {
            return redirect()
                ->route('budget.item.list')
                ->with('status', 'item-restored');
        }

        abort($result, $action->getMessage());
    }

    public function setAsNotPaidProcess(Request $request): RedirectResponse
    {
        $this->bootstrap();

        $action = new SetAsNotPaid();
        $result = $action(
            $this->resource_id,
            (int) $request->post('year'),
            (int) $request->post('month'),
            $request->route('item_id')
        );

        if ($result === 204) {
            return redirect()
                ->route('budget.item.view', [
                    'item_id' => $request->route('item_id'),
                    'item-month' => (int) $request->post('month'),
                    'item-yar' => (int) $request->post('year'),
                ])
                ->with('status', 'item-marked-as-not-paid');
        }

        abort($result, $action->getMessage());
    }

    public function setAsPaidProcess(Request $request): RedirectResponse
    {
        $this->bootstrap();

        $action = new SetAsPaid();
        $result = $action(
            $this->resource_id,
            (int) $request->post('year'),
            (int) $request->post('month'),
            $request->route('item_id')
        );

        if ($result === 201) {
            return redirect()
                ->route('budget.item.view', [
                    'item_id' => $request->route('item_id'),
                    'item-month' => (int) $request->post('month'),
                    'item-yar' => (int) $request->post('year'),
                ])
                ->with('status', 'item-marked-as-paid');
        }

        abort($result, $action->getMessage());
    }

    public function update(Request $request): View
    {
        $this->bootstrap();

        $budget = $this->setUpBudget($request);

        $budget_item = $this->api->budgetItem(
            $this->resource_type_id,
            $this->resource_id,
            $request->route('item_id')
        );

        if ($budget_item['status'] !== 200) {
            abort($budget_item['status'], $budget_item['content']);
        }

        return view(
            'budget.item.update',
            [
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

                'currency' => $budget->currency(),

                'item' => $budget_item['content'],

                'selected_now_month' => $request->query('month', $budget->nowMonth()),
                'selected_now_year' => $request->query('year', $budget->nowYear()),

                'item_year' => (int) $request->query('item-year', $budget->nowYear()),
                'item_month' => (int) $request->query('item-month', $budget->nowMonth()),

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
            $request->route('item_id'),
            $request->all()
        );

        if ($result === 204) {
            return redirect()
                ->route('budget.item.view', ['item_id' => $request->route('item_id')])
                ->with('status', 'item-updated');
        }

        if ($result === 422) {
            return redirect()
                ->route('budget.item.update', ['item_id' => $request->route('item_id')])
                ->withInput()
                ->with('validation.errors', $action->getValidationErrors());
        }

        abort($result, $action->getMessage());
    }
}
