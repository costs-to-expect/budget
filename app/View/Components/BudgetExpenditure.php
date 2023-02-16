<?php

namespace App\View\Components;

use App\Service\Budget\Month;
use Illuminate\View\Component;

class BudgetExpenditure extends Component
{
    /** @var Month[] */
    private array $months;

    public function __construct(array $months)
    {
        $this->months = $months;
    }

    public function render()
    {
        return view(
            'components.budget-expenditure',
            [
                'months' => $this->months,
            ]
        );
    }
}
