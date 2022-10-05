<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Budget\Item\Create;
use App\Actions\Budget\Item\Delete;
use App\Actions\Budget\Item\Disable;
use App\Actions\Budget\Item\Enable;
use App\Actions\Budget\Item\Update;
use Illuminate\Http\Request;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class BudgetItem extends Controller
{
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
            ]
        );
    }

    public function confirmDeleteProcess(Request $request)
    {
        $this->bootstrap($request);

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

                'item' => $budget_item['content'],
            ]
        );
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
            ]
        );
    }

    public function updateProcess(Request $request)
    {
        $this->bootstrap($request);

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
