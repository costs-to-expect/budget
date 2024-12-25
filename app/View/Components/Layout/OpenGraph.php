<?php

declare(strict_types=1);

namespace App\View\Components\Layout;

use Illuminate\View\Component;

class OpenGraph extends Component
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
    <meta property="og:url" content="https://budget.costs-to-expect.com">
        <meta property="og:site_name" content="Budget by Costs to Expect">
        <meta property="og:title" content="{{ $title }}">
        <meta property="og:description" content="{{ $description }}">
        <meta property="og:image" content="{{ asset('images/navbar-logo.png') }}">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="190">
        <meta property="og:image:height" content="190">
        <meta property="og:image:alt" content="Budget by Costs to Expect">
        <meta property="og:type" content="website">
blade;
    }
}

