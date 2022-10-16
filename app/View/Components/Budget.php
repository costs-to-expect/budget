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

    private ?string $active_item;
    private ?int $active_item_year;
    private ?int $active_item_month;

    private bool $projection;

    private bool $has_accounts;

    private bool $has_budget;

    public function __construct(
        array $accounts,
        array $months,
        array $pagination,
        array $viewEnd,
        bool $projection = true,
        bool $hasAccounts = true,
        bool $hasBudget = true,
        ?string $activeItem = null,
        ?int $activeItemYear = null,
        ?int $activeItemMonth = null,
    )
    {
        $this->accounts = $accounts;
        $this->months = $months;
        $this->pagination = $pagination;
        $this->view_end = $viewEnd;
        $this->active_item = $activeItem;
        $this->active_item_year = $activeItemYear;
        $this->active_item_month = $activeItemMonth;
        $this->projection = $projection;
        $this->has_accounts = $hasAccounts;
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
                'active_item' => $this->active_item,
                'active_item_year' => $this->active_item_year,
                'active_item_month' => $this->active_item_month,
                'projection' => $this->projection,
                'has_accounts' => $this->has_accounts,
                'has_budget' => $this->has_budget,
            ]
        );
    }
}
