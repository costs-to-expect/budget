<?php

declare(strict_types=1);

namespace App\View\Components\Helper\Control\Link;

use Illuminate\View\Component;

class Text extends Component
{
    public function __construct(
        private readonly string $label,
        private readonly string $route,
        private readonly bool $lockable = false
    )
    {
    }

    public function render()
    {
        return view('components.helper.control.link.text', [
            'label' => $this->label,
            'route' => $this->route,
            'lockable' => $this->lockable
        ]);
    }
}
