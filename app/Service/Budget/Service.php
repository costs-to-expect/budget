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
    /** @var Account[] */
    private array $accounts = [];

    /** @var Item[] */
    private array $budget_items = [];

    /** @var Month[] */
    private array $months = [];

    private DateTimeImmutable $start_date;

    private DateTimeImmutable $view_start_date;

    private DateTimeImmutable $view_end_date;

    public function __construct(array $accounts, ?int $month = null, ?int $year = null)
    {
        foreach ($accounts as $account) {
            $this->accounts[$account['id']] = new Account(
                $account['id'],
                $account['type'],
                $account['name'],
                $account['balance']
            );
        }

        $this->start_date = (new DateTimeImmutable('first day of this month'))->setTime(7, 1 );
        $this->view_start_date = (new DateTimeImmutable('first day of this month'))->setTime(7, 1);

        if ($month !== NULL && $year !== NULL) {
            $this->view_start_date = (new DateTimeImmutable(
                "{$year}-{$month}-01",
                new \DateTimeZone('UTC')
            ))->setTime(7, 1);
        }

        $this->setUpMonths();
    }

    public function account(string $id) : Account
    {
        return $this->accounts[$id];
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

    /**
     * @return array{ month: string, year: int}
     */
    public function viewEnd(): array
    {
        return [
            'month' => $this->view_end_date->format('F'),
            'year' => (int) $this->view_end_date->format('Y')
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

                    if ($budget_item->disabled() === false) {
                        if ($budget_item->category() === 'income') {
                            $this->accounts[$budget_item->account()]->add($budget_item->amount());
                        } else {
                            if ($budget_item->category() === 'savings') {
                                $this->accounts[$budget_item->account()]->sub($budget_item->amount());
                                $this->accounts[$budget_item->targetAccount()]->add($budget_item->amount()); // How do we deal with this?
                            } else {
                                $this->accounts[$budget_item->account()]->sub($budget_item->amount());
                            }
                        }
                    }
                }
            }
        }
    }

    private function setUpMonths(): void
    {
        for ($i = 0; $i < date_diff($this->start_date, $this->view_start_date)->m; $i++) {
            $next = $this->start_date->add(new \DateInterval("P{$i}M"));

            $year_int = (int) $next->format('Y');
            $month_int = (int) $next->format('n');

            $this->months[$year_int . '-' . $month_int] = new Month($month_int, $year_int, false);
        }

        for ($i = 0; $i < $this->numberOfVisibleMonths(); $i++) {

            $next = $this->view_start_date->add(new \DateInterval("P{$i}M"));

            $year_int = (int) $next->format('Y');
            $month_int = (int) $next->format('n');

            $this->view_end_date = (new DateTimeImmutable(
                "{$year_int}-{$month_int}-01", new \DateTimeZone('UTC')))->setTime(7, 1);

            $this->months[$year_int . '-' . $month_int] = new Month($month_int, $year_int, true);
        }
    }
}
