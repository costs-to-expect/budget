<?php

declare(strict_types=1);

namespace App\Service\Budget;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Service
{
    /** @var Item[] */
    private array $budget_items = [];

    /** @var array{ year: int, month: int, days: int, leap_year: boolean, items: Item[] } */
    private array $months = [];

    public function __construct()
    {
        $this->setUpMonths();
    }

    public function add(array $data): bool
    {
        /*if ($data['category'] !== 'savings') {
            $this->budget_items[] = new Expense();
        }*/

        $this->budget_items[] = new Item($data);

        return true;
    }

    public function currentMonth(): int
    {
        return (int) now(new \DateTimeZone('UTC'))->format('n');
    }

    public function endMonth(): int
    {
        return (int) now(new \DateTimeZone('UTC'))->addMonths($this->numberOfVisibleMonths())->format('n');
    }

    public function generate(): void
    {
        $this->assignItems();
    }

    /** @return Item[] */
    public function items(): array
    {
        return $this->budget_items;
    }

    public function months(): array
    {
        return $this->months;
    }

    public function numberOfVisibleMonths(): int
    {
        return 3;
    }

    private function assignItems(): void
    {
        foreach ($this->months as $month) {
            foreach ($this->budget_items as $budget_item) {

                if ($budget_item->activeForMonth($month['days'], $month['month'], $month['year']) === true) {
                    $this->months[$month['year'] . '-' . $month['month']]['items'][] = $budget_item;
                }
            }
        }
    }

    private function setUpMonths(): void
    {
        for ($i = 0; $i < $this->numberOfVisibleMonths(); $i++) {

            $year = (int) now(new \DateTimeZone('UTC'))->addMonths($i)->format('Y');
            $month = (int) now(new \DateTimeZone('UTC'))->addMonths($i)->format('n');

            $this->months[$year . '-' . $month] = [
                'year' => $year,
                'month' => $month,
                'name' => now(new \DateTimeZone('UTC'))->addMonths($i)->format('F'),
                'days' => (int) now(new \DateTimeZone('UTC'))->addMonths($i)->format('t'),
                'leap_year' => (bool) now(new \DateTimeZone('UTC'))->addMonths($i)->format('L'),
                'items' => [],
            ];
        }
    }
}
