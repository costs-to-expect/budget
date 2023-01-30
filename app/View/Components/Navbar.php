<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
    private ?string $active;

    public function __construct(?string $active = null)
    {
        $this->active = $active;
    }

    public function render()
    {
        return view('components.navbar', ['active' => $this->active]);
    }
}
