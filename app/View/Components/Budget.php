<?php

namespace App\View\Components;

use App\Service\Budget\Month;
use Illuminate\View\Component;

class Budget extends Component
{
    private array $accounts;

    /** @var Month[] */
    private array $months;

    private array $pagination;

    private array $view_end;

    private bool $active;

    private bool $projection;

    private bool $has_budget;

    public function __construct(
        array $accounts,
        array $months,
        array $pagination,
        array $viewEnd,
        bool $active = false,
        bool $projection = true,
        bool $hasBudget = true
    )
    {
        $this->accounts = $accounts;
        $this->months = $months;
        $this->pagination = $pagination;
        $this->view_end = $viewEnd;
        $this->active = $active;
        $this->projection = $projection;
        $this->has_budget = $hasBudget;
    }

    public function render()
    {
        return view(
            'components.budget',
            [
                'accounts' => $this->accounts,
                'months' => $this->months,
                'pagination' => $this->pagination,
                'view_end' => $this->view_end,
                'active' => $this->active,
                'projection' => $this->projection,
                'has_budget' => $this->has_budget,
            ]
        );
    }
}
