<?php

declare(strict_types=1);

namespace App\View\Components\Content\Landing;

use Illuminate\View\Component;

class TableHeaderRowDesktop extends Component
{
    public string $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function render()
    {
        return <<<'blade'
<tr>
    <th class="bg-gray-100 py-3 pl-6 text-left text-base font-medium text-pinky-800" colspan="3" scope="colgroup">{{ $title }}</th>
</tr>
blade;
    }
}
