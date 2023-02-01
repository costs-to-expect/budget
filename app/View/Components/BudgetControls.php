<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BudgetControls extends Component
{
    private array $accounts;

    private bool $has_savings_account;

    private bool $has_paid_items;

    private bool $now_visible;

    public function __construct(
        array $accounts,
        bool $hasSavingsAccount = false,
        bool $hasPaidItems = false,
        bool $nowVisible = true
    )
    {
        $this->accounts = $accounts;

        $this->has_savings_account = $hasSavingsAccount;
        $this->has_paid_items = $hasPaidItems;
        $this->now_visible = $nowVisible;
    }

    public function render()
    {
        return view(
            'components.budget-controls',
            [
                'accounts' => $this->accounts,
                'has_savings_account' => $this->has_savings_account,
                'has_paid_items' => $this->has_paid_items,
                'now_visible' => $this->now_visible,
            ]
        );
    }
}
