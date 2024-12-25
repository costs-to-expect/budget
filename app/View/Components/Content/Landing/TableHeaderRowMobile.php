<?php

declare(strict_types=1);

namespace App\View\Components\Content\Landing;

use Illuminate\View\Component;

class TableHeaderRowMobile extends Component
{
    public string $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function render()
    {
        return <<<'blade'
<caption class="border-t border-gray-200 bg-gray-50 py-3 px-4 text-left text-sm font-medium text-gray-900">
    {{ $title }}
</caption>
<thead>
<tr>
    <th class="sr-only" scope="col">Feature</th>
    <th class="sr-only" scope="col">Included</th>
</tr>
</thead>
blade;
    }
}
