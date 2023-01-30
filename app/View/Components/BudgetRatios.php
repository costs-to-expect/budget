<?php

namespace App\View\Components;

use App\Service\Budget\Month;
use Illuminate\View\Component;

class BudgetRatios extends Component
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
            'components.budget-ratios',
            [
                'months' => $this->months,
            ]
        );
    }
}
