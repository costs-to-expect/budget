<?php

declare(strict_types=1);

namespace App\View\Components\Content\Landing;

use Illuminate\View\Component;

class TableRowMobile extends Component
{
    public string $feature;

    public string $description;

    public function __construct(string $feature, string $description)
    {
        $this->feature = $feature;
        $this->description = $description;
    }

    public function render()
    {
        return <<<'blade'
<tr class="border-t border-gray-200">
    <th class="py-5 px-4 text-left text-sm font-normal text-gray-800" scope="row">{{ $feature }}</th>
    <td class="py-5 pr-4">
        <span class="block text-sm text-gray-900">{!! $description !!}</span>
    </td>
</tr>
blade;
    }
}
