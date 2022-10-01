<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Budget\Item\Create;
use App\Service\Budget\Service;
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
            'budget.item.confirm-delete',
            [
                'accounts' => $budget->accounts(),
                'months' => $budget->months(),
                'pagination' => $budget->paginationParameters(),
                'view_end' => $budget->viewEndPeriod(),
                'projection' => $budget->projection(),
            ]
        );
    }

    public function confirmDisable(Request $request)
    {
        $this->bootstrap($request);

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
            'budget.item.confirm-disable',
            [
                'accounts' => $budget->accounts(),
                'months' => $budget->months(),
                'pagination' => $budget->paginationParameters(),
                'view_end' => $budget->viewEndPeriod(),
                'projection' => $budget->projection(),
            ]
        );
    }

    public function create(Request $request)
    {
        $this->bootstrap($request);

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

        // We need to create a validation helper to handle displaying any error messages
        // returned from the API, must also support our customer error messages

        return view(
            'budget.item.create',
            [
                'accounts' => $budget->accounts(),
                'months' => $budget->months(),
                'pagination' => $budget->paginationParameters(),
                'view_end' => $budget->viewEndPeriod(),
                'projection' => $budget->projection(),
                'currency' => $budget->currency(),

                'has_savings_account' => $budget->hasSavingsAccount(),
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
            'budget.item.index',
            [
                'accounts' => $budget->accounts(),
                'months' => $budget->months(),
                'pagination' => $budget->paginationParameters(),
                'view_end' => $budget->viewEndPeriod(),
                'projection' => $budget->projection(),
            ]
        );
    }

    public function update(Request $request)
    {
        $this->bootstrap($request);

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
            'budget.item.update',
            [
                'accounts' => $budget->accounts(),
                'months' => $budget->months(),
                'pagination' => $budget->paginationParameters(),
                'view_end' => $budget->viewEndPeriod(),
                'projection' => $budget->projection(),
            ]
        );
    }
}
