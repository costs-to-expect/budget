<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Currency extends Component
{
    private array $currency;

    public function __construct(array $currency)
    {
        $this->currency = $currency;
    }

    public function render()
    {
        return view(
            'components.currency',
            [
                'currency' => $this->currency,
            ]
        );
    }
}
