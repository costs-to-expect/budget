<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Budget\Item\Adjust;
use App\Actions\Budget\Item\Create;
use App\Actions\Budget\Item\Delete;
use App\Actions\Budget\Item\Disable;
use App\Actions\Budget\Item\Enable;
use App\Actions\Budget\Item\Reset;
use App\Actions\Budget\Item\SetAsNotPaid;
use App\Actions\Budget\Item\SetAsPaid;
use App\Actions\Budget\Item\Update;
use App\Models\AdjustedBudgetItem;
use Illuminate\Http\Request;
use DateTimeZone;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class BudgetItem extends Controller
{
    public function adjustProcess(Request $request)
    {
        $this->bootstrap($request);

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

    public function confirmDelete(Request $request)
    {
        $this->bootstrap($request);

        $budget = $this->setUpBudget($request);

        $budget_item = $this->api->getBudgetItem(
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
                'accounts' => $budget->accounts(),
                'months' => $budget->months(),
                'pagination' => $budget->paginationParameters(),
                'view_end' => $budget->viewEndPeriod(),
                'projection' => $budget->projection(),

                'item' => $budget_item['content'],
                'adjusted_amount' => $adjusted_amount,

                'item_year' => (int) $request->query('item-year', $budget->nowYear()),
                'item_month' => (int) $request->query('item-month', $budget->nowMonth()),
            ]
        );
    }

    public function confirmDeleteProcess(Request $request)
    {
        $this->bootstrap($request);

        $action = new Delete();
        $result = $action(
            $this->api,
            $this->timezone,
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

    public function confirmDisable(Request $request)
    {
        $this->bootstrap($request);

        $budget = $this->setUpBudget($request);

        $budget_item = $this->api->getBudgetItem(
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
                'accounts' => $budget->accounts(),
                'months' => $budget->months(),
                'pagination' => $budget->paginationParameters(),
                'view_end' => $budget->viewEndPeriod(),
                'projection' => $budget->projection(),

                'item' => $budget_item['content'],
                'adjusted_amount' => $adjusted_amount,

                'item_year' => (int) $request->query('item-year', $budget->nowYear()),
                'item_month' => (int) $request->query('item-month', $budget->nowMonth()),
            ]
        );
    }

    public function confirmDisableProcess(Request $request)
    {
        $this->bootstrap($request);

        $action = new Disable();
        $result = $action(
            $this->api,
            $this->resource_type_id,
            $this->resource_id,
            $request->route('item_id')
        );

        if ($result === 204) {
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

    public function confirmEnable(Request $request)
    {
        $this->bootstrap($request);

        $budget = $this->setUpBudget($request);

        $budget_item = $this->api->getBudgetItem(
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
                'accounts' => $budget->accounts(),
                'months' => $budget->months(),
                'pagination' => $budget->paginationParameters(),
                'view_end' => $budget->viewEndPeriod(),
                'projection' => $budget->projection(),

                'item' => $budget_item['content'],
                'adjusted_amount' => $adjusted_amount,

                'item_year' => (int) $request->query('item-year', $budget->nowYear()),
                'item_month' => (int) $request->query('item-month', $budget->nowMonth()),
            ]
        );
    }

    public function confirmEnableProcess(Request $request)
    {
        $this->bootstrap($request);

        $action = new Enable();
        $result = $action(
            $this->api,
            $this->resource_type_id,
            $this->resource_id,
            $request->route('item_id')
        );

        if ($result === 204) {
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

    public function create(Request $request)
    {
        $this->bootstrap($request);

        $budget = $this->setUpBudget($request);

        return view(
            'budget.item.create',
            [
                'has_accounts' => $budget->hasAccounts(),
                'has_budget' => $budget->hasBudget(),
                'accounts' => $budget->accounts(),
                'months' => $budget->months(),
                'pagination' => $budget->paginationParameters(),
                'view_end' => $budget->viewEndPeriod(),
                'projection' => $budget->projection(),

                'currency' => $budget->currency(),
                'has_savings_account' => $budget->hasSavingsAccount(),

                'max_items' => $budget->maxItems(),
                'number_of_items' => $budget->numberOfItems(),
            ]
        );
    }

    public function createProcess(Request $request)
    {
        $this->bootstrap($request);

        $action = new Create();
        $result = $action(
            $this->api,
            $this->timezone,
            $this->resource_type_id,
            $this->resource_id,
            $request->all()
        );

        if ($result === 201) {
            if (array_key_exists('submit_and_return', $request->all())) {
                return redirect()
                    ->route('budget.item.create');
            }

            return redirect()
                ->route('home')
                ->with('status', 'item-added');
        }

        if ($result === 422) {
            return redirect()
                ->route('budget.item.create')
                ->withInput()
                ->with('validation.errors', $action->getValidationErrors());
        }

        abort($result, $action->getMessage());
    }

    public function index(Request $request)
    {
        $this->bootstrap($request);

        $budget = $this->setUpBudget($request);

        $budget_item = $this->api->getBudgetItem(
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
            $adjust_date = (new \DateTimeImmutable("{$item_year}-{$item_month}-01", $this->timezone))->setTime(7, 1);
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
                'accounts' => $budget->accounts(),
                'months' => $budget->months(),
                'pagination' => $budget->paginationParameters(),
                'view_end' => $budget->viewEndPeriod(),
                'projection' => $budget->projection(),

                'now_month' => $budget->nowMonth(),
                'now_year' => $budget->nowYear(),
                'is_paid' => in_array($request->route('item_id'), $budget->paidItems(), true),

                'item' => $budget_item['content'],
                'adjusted_amount' => $adjusted_amount,

                'item_year' => $item_year,
                'item_month' => $item_month,

                'action' => $action,
                'adjust_date' => $adjust_date
            ]
        );
    }

    public function resetProcess(Request $request)
    {
        $this->bootstrap($request);

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

    public function setAsNotPaidProcess(Request $request)
    {
        $this->bootstrap($request);

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
                    'item-month'=> (int) $request->post('month'),
                    'item-yar' => (int) $request->post('year'),
                ])
                ->with('status', 'item-marked-as-not-paid');
        }

        abort($result, $action->getMessage());
    }

    public function setAsPaidProcess(Request $request)
    {
        $this->bootstrap($request);

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
                    'item-month'=> (int) $request->post('month'),
                    'item-yar' => (int) $request->post('year'),
                ])
                ->with('status', 'item-marked-as-paid');
        }

        abort($result, $action->getMessage());
    }

    public function update(Request $request)
    {
        $this->bootstrap($request);

        $budget = $this->setUpBudget($request);

        $budget_item = $this->api->getBudgetItem(
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
                'accounts' => $budget->accounts(),
                'months' => $budget->months(),
                'pagination' => $budget->paginationParameters(),
                'view_end' => $budget->viewEndPeriod(),
                'projection' => $budget->projection(),

                'currency' => $budget->currency(),
                'has_savings_account' => $budget->hasSavingsAccount(),

                'item' => $budget_item['content'],

                'item_year' => (int) $request->query('item-year', $budget->nowYear()),
                'item_month' => (int) $request->query('item-month', $budget->nowMonth()),
            ]
        );
    }

    public function updateProcess(Request $request)
    {
        $this->bootstrap($request);

        $action = new Update();
        $result = $action(
            $this->api,
            $this->timezone,
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
