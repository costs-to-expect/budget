<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BudgetItem extends Component
{
    private array $item;
    private array $accounts;

    public function __construct(array $accounts, array $item)
    {
        $this->item = $item;
        $this->accounts = $accounts;

        $this->item['start_date'] = new \DateTimeImmutable($this->item['start_date'], new \DateTimeZone('UTC'));
        $this->item['end_date'] = ($this->item['end_date'] !== null) ? new \DateTimeImmutable($this->item['end_date'], new \DateTimeZone('UTC')) : null;
        if (
            $this->item['frequency']['type'] === 'monthly' &&
            is_array($this->item['frequency']['exclusions']) &&
            count($this->item['frequency']['exclusions']) > 0
        ) {
            $exclusions = array_map(static fn ($m) => (new Month($m))->render()->getData()['name'], $this->item['frequency']['exclusions']);
            $this->item['exclusions'] = implode(', ', $exclusions);
        }
    }

    public function render()
    {
        return view('components.budget-item', ['accounts' => $this->accounts, 'item' => $this->item]);
    }
}
