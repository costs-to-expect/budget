<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HtmlHead extends Component
{
    public string $title;
    public string $description;

    public function __construct(string $title, string $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function render()
    {
        return view('components.html-head', [
            'title' => $this->title,
            'description' => $this->description,
        ]);
    }
}
