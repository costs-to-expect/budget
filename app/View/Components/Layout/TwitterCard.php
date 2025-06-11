<?php

declare(strict_types=1);

namespace App\View\Components\Layout;

use Illuminate\View\Component;

class TwitterCard extends Component
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
        return <<<'blade'
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="@coststoexpect" />
        <meta name="twitter:creator" content="@DBlackborough" />
        <meta name="twitter:title" content="{{ $title }}" />
        <meta name="twitter:description" content="{{ $description }}" />
        <meta name="twitter:image" content="{{ asset('images/navbar-logo.png') }}" />
        <meta name="twitter:image:alt" content="Budget by Costs to Expect" />
blade;
    }
}
