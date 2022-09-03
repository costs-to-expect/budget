<?php

namespace App\View\Components;

use App\Service\Budget\Month;
use Illuminate\View\Component;

class Budget extends Component
{
    /** @var Month[] */
    public array $months;

    public array $pagination;

    private bool $active;

    public function __construct(array $months, array $pagination, bool $active = false)
    {
        $this->months = $months;
        $this->pagination = $pagination;
        $this->active = $active;
    }

    public function render()
    {
        return view(
            'components.budget',
            [
                'months' => $this->months,
                'pagination' => $this->pagination,
                'active' => $this->active,
            ]
        );
    }
}
