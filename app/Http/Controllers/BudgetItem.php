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

        foreach ($this->mock_data as $budget_item) {
            $budget->add($budget_item);
        }

        $budget->allocatedItemsToMonths();

        return view(
            'budget.item.confirm-delete',
            [
                'months' => $budget->months(),
                'pagination' => $budget->pagination(),
            ]
        );
    }

    public function confirmDisable(Request $request)
    {
        $this->bootstrap($request);

        $budget = new Service();

        foreach ($this->mock_data as $budget_item) {
            $budget->add($budget_item);
        }

        $budget->allocatedItemsToMonths();

        return view(
            'budget.item.confirm-disable',
            [
                'months' => $budget->months(),
                'pagination' => $budget->pagination(),
            ]
        );
    }

    public function create(Request $request)
    {
        $this->bootstrap($request);

        $budget = new Service();

        foreach ($this->mock_data as $budget_item) {
            $budget->add($budget_item);
        }

        $budget->allocatedItemsToMonths();

        return view(
            'budget.item.create',
            [
                'months' => $budget->months(),
                'pagination' => $budget->pagination(),
            ]
        );
    }

    public function index(Request $request)
    {
        $this->bootstrap($request);

        $budget = new Service();

        foreach ($this->mock_data as $budget_item) {
            $budget->add($budget_item);
        }

        $budget->allocatedItemsToMonths();

        return view(
            'budget.item.index',
            [
                'months' => $budget->months(),
                'pagination' => $budget->pagination(),
            ]
        );
    }

    public function update(Request $request)
    {
        $this->bootstrap($request);

        $budget = new Service();

        foreach ($this->mock_data as $budget_item) {
            $budget->add($budget_item);
        }

        $budget->allocatedItemsToMonths();

        return view(
            'budget.item.update',
            [
                'months' => $budget->months(),
                'pagination' => $budget->pagination(),
            ]
        );
    }
}
