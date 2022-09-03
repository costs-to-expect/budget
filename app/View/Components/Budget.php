<?php

namespace App\View\Components;

use App\Service\Budget\Month;
use Illuminate\View\Component;

class Budget extends Component
{
    /** @var Month[] */
    public array $months;

    public array $pagination;

    public function __construct(array $months, array $pagination)
    {
        $this->months = $months;
        $this->pagination = $pagination;
    }

    public function render()
    {
        return view(
            'components.budget',
            [
                'months' => $this->months,
                'pagination' => $this->pagination
            ]
        );
    }
}
