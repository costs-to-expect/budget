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
class BudgetItem extends Controller
{
    public function confirmDelete(Request $request)
    {
        $this->bootstrap($request);

        $budget = new Service();
        if ($request->query('month') !== null && $request->query('year') !== null) {
            $budget->setPagination((int) $request->query('month'), (int) $request->query('year'));
        }
        $budget->setAccounts($this->mock_accounts_data)
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
        $budget->setAccounts($this->mock_accounts_data)
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
        $budget->setAccounts($this->mock_accounts_data)
            ->create();

        foreach ($this->mock_data as $budget_item) {
            $budget->addItem($budget_item);
        }

        $budget->assignItemsToBudget();

        return view(
            'budget.item.create',
            [
                'accounts' => $budget->accounts(),
                'months' => $budget->months(),
                'pagination' => $budget->paginationParameters(),
                'view_end' => $budget->viewEndPeriod(),
                'projection' => $budget->projection(),
            ]
        );
    }

    public function index(Request $request)
    {
        $this->bootstrap($request);

        $budget = new Service();
        if ($request->query('month') !== null && $request->query('year') !== null) {
            $budget->setPagination((int) $request->query('month'), (int) $request->query('year'));
        }
        $budget->setAccounts($this->mock_accounts_data)
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
        $budget->setAccounts($this->mock_accounts_data)
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
