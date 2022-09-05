<?php

declare(strict_types=1);

namespace App\Service\Budget;

use DateTimeImmutable;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Service
{
    private array $accounts = [];

    /** @var Item[] */
    private array $budget_items = [];

    /** @var Month[] */
    private array $months = [];

    private DateTimeImmutable $start_date;

    private DateTimeImmutable $view_start_date;

    public function __construct(array $accounts)
    {
        $this->accounts = [];

        $start_month = null;
        $start_year = null;
        if (request()->query('month') !== null && request()->query('year') !== null) {
            $start_month = (int) request()->query('month');
            $start_year = (int) request()->query('year');
        }

        $this->start_date = (new DateTimeImmutable('first day of this month'))->setTime(7, 1 );
        $this->view_start_date = (new DateTimeImmutable('first day of this month'))->setTime(7, 1);

        if ($start_month !== NULL && $start_year !== NULL) {
            $this->view_start_date = (new DateTimeImmutable(
                "{$start_year}-{$start_month}-01",
                new \DateTimeZone('UTC')
            ))->setTime(7, 1);
        }

        $this->setUpMonths();
    }

    public function accounts(): array
    {
        return $this->accounts;
    }

    public function add(array $data): bool
    {
        $this->budget_items[] = new Item($data);

        return true;
    }

    public function pagination(): array
    {
        if (date_diff($this->start_date, $this->view_start_date)->days === 0) {
            $earlier = null;
        } else {
            $date = $this->view_start_date->sub(new \DateInterval("P1M"));
            $earlier = [
                'month' => $date->format('n'),
                'year' => $date->format('Y')
            ];
        }

        $later = $this->view_start_date->add(new \DateInterval("P1M"));

        return [
            'previous' => $earlier,
            'next' => [
                'month' => (int) $later->format('n'),
                'year' => (int) $later->format('Y')
            ]
        ];
    }

    /*private function startMonth(): int
    {
        return (int) $this->start_date->format('n');
    }

    public function endMonth(): int
    {
        return (int) now(new \DateTimeZone('UTC'))->addMonths($this->numberOfVisibleMonths())->format('n');
    }*/

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

    public function allocatedItemsToMonths(): void
    {
        foreach ($this->months as $month) {
            foreach ($this->budget_items as $budget_item) {
                if ($budget_item->activeForMonth($month->days(), $month->month(), $month->year()) === true) {
                    $this->months[$month->year() . '-' . $month->month()]->add($budget_item);
                }
            }
        }
    }

    private function setUpMonths(): void
    {
        $year_int = (int) $this->view_start_date->format('Y');
        $month_int = (int) $this->view_start_date   ->format('n');

        $this->months[$year_int . '-' . $month_int] = new Month($month_int, $year_int);

        for ($i = 1; $i < $this->numberOfVisibleMonths(); $i++) {

            $next = $this->view_start_date->add(new \DateInterval("P{$i}M"));

            $year_int = (int) $next->format('Y');
            $month_int = (int) $next->format('n');

            $this->months[$year_int . '-' . $month_int] = new Month($month_int, $year_int);
        }
    }
}
