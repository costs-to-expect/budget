<?php

declare(strict_types=1);

namespace App\View\Components\Content\Landing;

use Illuminate\View\Component;

class TableRowDesktop extends Component
{
    public string $feature;

    public string $budget;

    public string $budget_pro;

    public function __construct(string $feature, string $budget, string $budgetPro)
    {
        $this->feature = $feature;
        $this->budget = $budget;
        $this->budget_pro = $budgetPro;
    }

    public function render()
    {
        return <<<'blade'
<tr>
    <th class="py-5 px-6 text-left text-sm font-normal text-gray-800" scope="row">{{ $feature }}</th>

    <td class="py-5 px-6">
        <span class="block text-sm text-gray-900">{{ $budget }}</span>
    </td>

    <td class="py-5 px-6">
        <span class="block text-sm text-gray-900">{{ $budget_pro }}</span>
    </td>
</tr>
blade;
    }
}
