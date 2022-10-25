<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Config;
use Illuminate\View\Component;

class BudgetItemTableRow extends Component
{
    protected array $accounts;
    protected array $item;

    public function __construct(array $accounts, array $item)
    {
        $this->accounts = $accounts;
        $this->item = $item;

        $this->item['start_date'] = new \DateTimeImmutable($this->item['start_date'], new \DateTimeZone(Config::get('app.config.timezone')));
        $this->item['end_date'] = ($this->item['end_date'] !== null) ? new \DateTimeImmutable($this->item['end_date'], new \DateTimeZone(Config::get('app.config.timezone'))) : null;
        if (
            $this->item['frequency']['type'] === 'monthly' &&
            is_array($this->item['frequency']['exclusions']) &&
            count($this->item['frequency']['exclusions']) > 0
        ) {
            $exclusions = array_map(static fn ($m) => (new Month($m))->render()->getData()['name'], $this->item['frequency']['exclusions']);
            $this->item['exclusions'] = implode(', ', $exclusions);
        }

        $this->item['status'] = 'Active';
        if ($this->item['disabled'] === 1) {
            $this->item['status'] = 'Disabled';
        }
        if ($this->item['end_date'] !== null && $this->item['end_date'] < new \DateTimeImmutable('now', new \DateTimeZone(Config::get('app.config.timezone')))) {
            $this->item['status'] = 'Deleted/Expired';
        }
    }

    public function render()
    {
        return view(
            'components.budget-item-table-row',
            [
                'account' => $this->accounts[$this->item['account']],
                'item' => $this->item,
            ]
        );
    }
}
