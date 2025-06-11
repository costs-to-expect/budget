<?php

declare(strict_types=1);

namespace App\View\Components\Layout;

use Illuminate\View\Component;

class Navbar extends Component
{
    public string $active_route;

    public function __construct(string $activeRoute)
    {
        $this->active_route = $activeRoute;
    }

    public function render()
    {
        return view(
            'components.layout.navbar',
            [
                'active_route' => $this->active_route,
            ]
        );
    }
}
