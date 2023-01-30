<?php

namespace App\View\Components;

use App\Service\Budget\Month;
use Illuminate\View\Component;

class Budget extends Component
{
    /** @var Month[] */
    private array $months;
    private ?string $active_item;
    private ?int $active_item_year;
    private ?int $active_item_month;

    public function __construct(
        array $months,
        ?string $activeItem = null,
        ?int $activeItemYear = null,
        ?int $activeItemMonth = null,
    )
    {
        $this->months = $months;
        $this->active_item = $activeItem;
        $this->active_item_year = $activeItemYear;
        $this->active_item_month = $activeItemMonth;
    }

    public function render()
    {
        return view(
            'components.budget',
            [
                'months' => $this->months,
                'active_item' => $this->active_item,
                'active_item_year' => $this->active_item_year,
                'active_item_month' => $this->active_item_month,
            ]
        );
    }
}
