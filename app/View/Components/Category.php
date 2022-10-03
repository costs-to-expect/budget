<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Category extends Component
{
    private string $category;

    public function __construct(string $category)
    {
        $this->category = $category;
    }

    public function render()
    {
        return view(
            'components.category',
            [
                'category' => $this->category,
            ]
        );
    }
}
