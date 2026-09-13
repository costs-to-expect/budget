<?php

declare(strict_types=1);

namespace App\View\Components\Layout;

use Illuminate\View\Component;

class OpenGraph extends Component
{
    public string $title;

    public string $description;

    public string $url;

    public function __construct(string $title, string $description, ?string $path = null)
    {
        $this->title = $title;
        $this->description = $description;

        $path ??= request()->path();
        $path = ($path === '' || $path === '/') ? '' : '/' . ltrim($path, '/');
        $this->url = 'https://budget.costs-to-expect.com' . $path;
    }

    public function render()
    {
        return <<<'blade'
    <meta property="og:url" content="{{ $url }}">
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

