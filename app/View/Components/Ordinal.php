<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Ordinal extends Component
{
    private int $day;

    private string $ordinal;

    public function __construct(int $day)
    {
        $this->day = $day;
        $this->ordinal = match ($day) {
            1, 21, 31 => 'st',
            2, 22 => 'nd',
            3 => 'rd',
            default => 'th',
        };
    }

    public function render()
    {
        return view(
            'components.ordinal',
            [
                'day' => $this->day,
                'ordinal' => $this->ordinal,
            ]
        );
    }
}
