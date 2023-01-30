<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BudgetDefinitions extends Component
{
    public function __construct()
    {
    }

    public function render()
    {
        return view(
            'components.budget-definitions',
            [
            ]
        );
    }
}
