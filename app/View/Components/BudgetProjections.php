<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BudgetProjections extends Component
{
    private array $accounts;

    private array $view_end;

    private bool $projection;

    public function __construct(
        array $accounts,
        array $viewEnd,
        bool $projection = true
    ) {
        $this->accounts = $accounts;
        $this->view_end = $viewEnd;
        $this->projection = $projection;
    }

    public function render()
    {
        return view(
            'components.budget-projections',
            [
                'accounts' => $this->accounts,
                'view_end' => $this->view_end,
                'projection' => $this->projection,
            ]
        );
    }
}
