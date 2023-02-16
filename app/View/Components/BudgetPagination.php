<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BudgetPagination extends Component
{
    private array $pagination;

    public function __construct(
        array $pagination,
    ) {
        $this->pagination = $pagination;
    }

    public function render()
    {
        return view(
            'components.budget-pagination',
            [
                'pagination' => $this->pagination,
            ]
        );
    }
}
