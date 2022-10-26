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
        if ($this->item['disabled'] === 1) {
            $this->item['status'] = 'Disabled';
        }
        if ($this->item['end_date'] !== null && $this->item['end_date'] < new \DateTimeImmutable('now', new \DateTimeZone(Config::get('app.config.timezone')))) {
            $this->item['status'] = 'Deleted/Expired';
        }

        $this->item['uri'] = [
            'item_id' => $this->item['id'],
            'month' => $month,
            'year' => $year
        ];/*

        if ($this->item['status'] === 'Active') {

            if ($this->item['frequency']['type'] === 'monthly') {
                if (in_array($uri_params['month'], $this->item['exclusions'], true)) {
                    // Find the previous free month

                }
            }
        }*/



        // URI params for the "View on Budget button"
        // Params for monthly items (need to take exclusions into account, go to the next possible instance, or last instance if no next instance)
        // Params for annual items (need to go to the next possible instance, or the last if no next instance)
        // Params for one-off items (need to just go to the item)

        // Enable, simple turns on the budget item and returns to the list

        // Maybe we need a discard item button as well but that is annoying as we need the confirmation

        // We should think about showing the number of created items as a count and how many more can be created
        // Another way to upsell to Budget Pro, or at least help people work within the limit of 35
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
