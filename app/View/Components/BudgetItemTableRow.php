<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Config;
use Illuminate\View\Component;

class BudgetItemTableRow extends Component
{
    protected array $accounts;
    protected array $item;
    protected int $year;
    protected int $month;

    public function __construct(array $accounts, array $item, int $year, int $month)
    {
        $this->accounts = $accounts;
        $this->item = $item;
        $this->year = $year;
        $this->month = $month;

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
        if ($this->item['disabled'] === true) {
            $this->item['status'] = 'Disabled';
        }
        if ($this->item['end_date'] !== null && $this->item['end_date'] < new \DateTimeImmutable('now', new \DateTimeZone(Config::get('app.config.timezone')))) {
            $this->item['status'] = 'Deleted/Expired';
        }

        $this->item['uri'] = [
            'item_id' => $this->item['id'],
            'month' => $month,
            'year' => $year,
            'item-month' => $month,
            'item-year' => $year
        ];

        if ($this->item['status'] === 'Active') {

            // Look for exclusions, select the next free month
            if (
                $this->item['frequency']['type'] === 'monthly' &&
                in_array($this->item['uri']['month'], $this->item['frequency']['exclusions'], true)
            ) {
                for($i = $this->item['uri']['month'] + 1; $i < 13; $i++) {
                    if (in_array($i, $this->item['frequency']['exclusions'], true) === false) {
                        $this->item['uri']['month'] = $i;
                        $this->item['uri']['item-month'] = $i;
                        break;
                    }
                }

                $this->item['uri']['year']++;
                $this->item['uri']['item-year']++;

                for($i = 1; $i < 13; $i++) {
                    if (in_array($i, $this->item['frequency']['exclusions'], true) === false) {
                        $this->item['uri']['month'] = $i;
                        $this->item['uri']['item-month'] = $i;
                        break;
                    }
                }
            }

            if ($this->item['frequency']['type'] === 'annually') {
                $this->item['uri']['item-month'] = $this->item['frequency']['month'];
                $this->item['uri']['month'] = $this->item['frequency']['month'];
                if ($this->item['frequency']['month'] < $month) {
                    $this->item['uri']['year']++;
                    $this->item['uri']['item-year']++;
                }
            }

            if ($this->item['frequency']['type'] === 'one-off') {
                $this->item['uri']['item-month'] = $this->item['frequency']['month'];
                $this->item['uri']['item-year'] = $this->item['frequency']['year'];
                $this->item['uri']['month'] = $this->item['frequency']['month'];
                if ($this->item['frequency']['month'] < $month) {
                    $this->item['uri']['year']++;
                    $this->item['uri']['item-year']++;
                }
            }
        }
    }

    public function render()
    {
        return view(
            'components.budget-item-table-row',
            [
                'account' => $this->accounts[$this->item['account']],
                'item' => $this->item,
                'year' => $this->year,
                'month' => $this->month,
            ]
        );
    }
}
