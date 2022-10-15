<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BudgetItem extends Component
{
    private array $item;
    private array $accounts;
    private int $item_year;
    private int $item_month;
    private ?float $adjusted_amount;

    public function __construct(
        array $accounts,
        array $item,
        int $itemYear,
        int $itemMonth,
        float $adjustedAmount = null
    )
    {
        $this->item = $item;
        $this->accounts = $accounts;
        $this->item_year = $itemYear;
        $this->item_month = $itemMonth;
        $this->adjusted_amount = $adjustedAmount;

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
        return view(
            'components.budget-item',
            [
                'accounts' => $this->accounts,
                'item' => $this->item,
                'item_year' => $this->item_year,
                'item_month' => $this->item_month,
                'adjusted_amount' => $this->adjusted_amount,
            ]
        );
    }
}
