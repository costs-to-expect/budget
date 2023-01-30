<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BudgetMissing extends Component
{
    private bool $has_accounts;

    private bool $has_savings_account;

    public function __construct(
        bool $hasAccounts = true,
        bool $hasSavingsAccount = false
    )
    {
        $this->has_accounts = $hasAccounts;
        $this->has_savings_account = $hasSavingsAccount;
    }

    public function render()
    {
        return view(
            'components.budget-missing',
            [
                'has_accounts' => $this->has_accounts,
                'has_savings_account' => $this->has_savings_account,
            ]
        );
    }
}
