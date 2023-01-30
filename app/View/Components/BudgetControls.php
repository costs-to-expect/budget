<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BudgetControls extends Component
{
    private bool $has_accounts;

    private bool $has_budget;

    private bool $has_savings_account;

    private bool $has_paid_items;

    private bool $now_visible;

    public function __construct(
        bool $hasAccounts = true,
        bool $hasBudget = true,
        bool $hasSavingsAccount = false,
        bool $hasPaidItems = false,
        bool $nowVisible = true
    )
    {
        $this->has_accounts = $hasAccounts;
        $this->has_budget = $hasBudget;
        $this->has_savings_account = $hasSavingsAccount;
        $this->has_paid_items = $hasPaidItems;
        $this->now_visible = $nowVisible;
    }

    public function render()
    {
        return view(
            'components.budget-controls',
            [
                'has_accounts' => $this->has_accounts,
                'has_budget' => $this->has_budget,
                'has_savings_account' => $this->has_savings_account,
                'has_paid_items' => $this->has_paid_items,
                'now_visible' => $this->now_visible,
            ]
        );
    }
}
