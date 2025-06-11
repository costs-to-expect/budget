<?php

declare(strict_types=1);

namespace App\View\Components\Content\Landing;

use Illuminate\View\Component;

class Feature extends Component
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
<div class="border-t border-gray-200 pt-4">
    <dt class="font-medium text-lg text-gray-900">{{ $title }}</dt>
    <dd class="mt-2 text-sm text-gray-800">{{ $description }}</dd>
</div>
blade;
    }
}
