<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Month extends Component
{
    private int $month;
    private string $name;

    public function __construct(int $month)
    {
        $this->month = $month;
        $this->name = match ($month) {
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
            default => 'January',
        };
    }

    public function render()
    {
        return view(
            'components.month',
            [
                'name' => $this->name
            ]
        );
    }
}
