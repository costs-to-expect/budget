<?php

declare(strict_types=1);

namespace App\Service\Budget;

use DateInterval;
use DateTimeImmutable;
use DateTimeZone;
use Exception;
use LengthException;

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

    private bool $projection = true;

    private array $currency;
    private array $default_currency;

    private int $now_month;
    private int $now_year;

    private array $paid_items = [];

    private array $adjustments = [];
    private array $selected = [
        'item' => null,
        'month' => null,
        'year' => null,
    ];

    private DateTimeZone $timezone;

    public function __construct(DateTimeZone $timezone)
    {
        $this->timezone = $timezone;

        $this->start_date = (new DateTimeImmutable('first day of this month', $this->timezone))->setTime(7, 1);
        $this->view_start_date = (new DateTimeImmutable('first day of this month', $this->timezone))->setTime(7, 1);

        $this->now_year = (int) $this->start_date->format('Y');
        $this->now_month = (int) $this->start_date->format('n');

        $this->default_currency = [
            'id' => 'epMqeYqPkL',
            'code' => 'GBP',
            'name' => 'Sterling'
        ];
    }

    public function setNow(DateTimeImmutable $start_date): Service
    {
        $this->start_date = $start_date;
        $this->view_start_date = $start_date;

        $this->now_year = (int) $this->start_date->format('Y');
        $this->now_month = (int) $this->start_date->format('n');

        return $this;
    }

    public function setPagination(int $month, $year): Service
    {
        $this->view_start_date = (new DateTimeImmutable(
            "{$year}-{$month}-01",
            $this->timezone
        ))->setTime(7, 1);

        return $this;
    }

    public function setPaidBudgetItems(array $paid_items): Service
    {
        $this->paid_items = $paid_items;

        return $this;
    }

    public function setSelected(string $item, int $month, int $year): Service
    {
        $this->selected = [
            'item' => $item,
            'month' => $month,
            'year' => $year
        ];

        return $this;
    }

    /**
     * @throws Exception
     */
    public function setAccounts(array $accounts): Service
    {
        if (count($accounts) > $this->maxAccounts()) {
            throw new LengthException('Too many accounts, the limit is ' . $this->maxAccounts());
        }

        foreach ($accounts as $account) {

            if (isset($this->currency) === false) {
                $this->currency = $account['currency'];
            }

            $this->accounts[$account['id']] = new Account(
                $account['id'],
                $account['name'],
                $account['type'],
                $account['currency'],
                (float) $account['balance'],
                array_key_exists('color', $account) === true ? $account['color'] : '#' . dechex(random_int(0, 16777215)),
                $account['description']
            );
        }

        if (isset($this->currency) === false) {
            $this->currency = $this->default_currency;
        }

        return $this;
    }

    public function setAdjustments(array $adjustments): Service
    {
        $this->adjustments = $adjustments;

        return $this;
    }

    public function setCurrency(array $currency): Service
    {
        $this->currency = $currency;

        return $this;
    }

    public function create(): void
    {
        $this->setUpMonths();
    }

    private function setUpMonths(): void
    {
        $date_diff = date_diff($this->start_date, $this->view_start_date);

        if ($date_diff->invert === 0) {
            for (
                $i = 0;
                $i < ($date_diff->y * 12) + $date_diff->m;
                $i++
            ) {
                $next = $this->start_date->add(new DateInterval("P{$i}M"));

                $year_int = (int)$next->format('Y');
                $month_int = (int)$next->format('n');

                $this->months[$year_int . '-' . $month_int] = new Month(
                    $this->timezone,
                    $month_int,
                    $year_int,
                    $this->currency(),
                    false,
                    ($this->now_year === $year_int && $this->now_month === $month_int)
                );
            }
        }

        $added_to_view_start_date = 0;
        if ($date_diff->invert === 1) {
            $date_diff = date_diff($this->view_start_date, $this->start_date);

            $period_in_months = ($date_diff->y * 12) + $date_diff->m;

            for (
                $i = 0;
                $i < (min($period_in_months, 3));
                $i++
            ) {
                $added_to_view_start_date++;
                $next = $this->view_start_date->add(new DateInterval("P{$i}M"));

                $year_int = (int)$next->format('Y');
                $month_int = (int)$next->format('n');

                if ($i === 2) {
                    $this->projection = false; // We are not projecting as there are three past months on display
                    $this->view_end_date = (new DateTimeImmutable(
                        "{$year_int}-{$month_int}-01", $this->timezone
                    ))->setTime(7, 1);
                }

                $this->months[$year_int . '-' . $month_int] = new Month(
                    $this->timezone,
                    $month_int,
                    $year_int,
                    $this->currency(),
                    true,
                    ($this->now_year === $year_int && $this->now_month === $month_int),
                    false
                );
            }
        }

        for ($i = 0; $i < $this->numberOfVisibleMonths() - $added_to_view_start_date; $i++) {
            $months_to_add = $i + $added_to_view_start_date;

            $next = $this->view_start_date->add(new DateInterval("P{$months_to_add}M"));

            $year_int = (int)$next->format('Y');
            $month_int = (int)$next->format('n');

            $this->view_end_date = (new DateTimeImmutable(
                "{$year_int}-{$month_int}-01", $this->timezone
            ))->setTime(7, 1);

            $this->months[$year_int . '-' . $month_int] = new Month(
                $this->timezone,
                $month_int,
                $year_int,
                $this->currency(),
                true,
                ($this->now_year === $year_int && $this->now_month === $month_int)
            );
        }
    }

    public function nowMonth(): int
    {
        return $this->now_month;
    }

    public function nowYear(): int
    {
        return $this->now_year;
    }

    public function numberOfItems(): int
    {
        return count($this->budget_items);
    }

    public function numberOfVisibleMonths(): int
    {
        return 3;
    }

    public function currency(): array
    {
        if (isset($this->currency) === false) {
            return $this->default_currency;
        }

        return $this->currency;
    }

    public function currencyId(): string
    {
        return $this->currency['id'];
    }

    public function currencyCode(): string
    {
        return $this->currency['code'];
    }

    public function currencyName(): string
    {
        return $this->currency['name'];
    }

    public function hasAccounts(): bool
    {
        return count($this->accounts) > 0;
    }

    public function hasBudget(): bool
    {
        return count($this->budget_items) > 0;
    }

    public function hasPaidItems(): bool
    {
        return $this->paid_items > 0;
    }

    public function hasSavingsAccount(): bool
    {
        foreach ($this->accounts() as $account) {
            if ($account->type() === 'savings') {
                return true;
            }
        }

        return false;
    }

    public function accounts(): array
    {
        return $this->accounts;
    }

    public function addItem(array $data): bool
    {
        if (count($this->budget_items) > $this->maxItems()) {
            throw new LengthException('Too many items, the limit is ' . $this->maxItems());
        }

        try {
            $this->budget_items[] = new Item(
                array_merge(
                    $data,
                    [
                        'account_color' => $this->account($data['account'])->color(),
                        'account_name' => $this->account($data['account'])->name()
                    ]
                ), $this->timezone
            );
        } catch (Exception $e) {
            throw new \RuntimeException('Unable to add item to budget service: ' . $e->getMessage());
        }

        return true;
    }

    public function paidItems(): array
    {
        return $this->paid_items;
    }

    public function paginationParameters(): array
    {
        $earlier = $this->view_start_date->sub(new DateInterval("P1M"));
        $later = $this->view_start_date->add(new DateInterval("P1M"));

        return [
            'previous' => [
                'month' => (int)$earlier->format('n'),
                'year' => (int)$earlier->format('Y')
            ],
            'next' => [
                'month' => (int)$later->format('n'),
                'year' => (int)$later->format('Y')
            ],
            'selected' => $this->selected
        ];
    }

    public function projection(): bool
    {
        return $this->projection;
    }

    /**
     * @return array{ month: string, year: int}
     */
    public function viewEndPeriod(): array
    {
        return [
            'month' => $this->view_end_date->format('F'),
            'year' => (int)$this->view_end_date->format('Y')
        ];
    }

    public function maxItems(): int
    {
        return 100;
    }

    public function maxAccounts(): int
    {
        return 3;
    }

    public function months(): array
    {
        return $this->months;
    }

    public function assignItemsToBudget(): void
    {
        foreach ($this->months as $month) {
            foreach ($this->budget_items as $budget_item) {
                if ($budget_item->activeForMonth($month->days(), $month->month(), $month->year()) === true) {

                    if ($month->now() === true && in_array($budget_item->id(), $this->paid_items, true)) {
                        $budget_item = clone $budget_item;
                        $budget_item->setPaid(true);
                    }

                    if (
                        array_key_exists($budget_item->id(), $this->adjustments) === true &&
                        array_key_exists($month->year(), $this->adjustments[$budget_item->id()]) === true &&
                        array_key_exists($month->month(), $this->adjustments[$budget_item->id()][$month->year()]) === true
                    ) {
                        $budget_item = clone $budget_item;
                        $budget_item->setAdjustment($this->adjustments[$budget_item->id()][$month->year()][$month->month()]);
                    }

                    $this->months[$month->year() . '-' . $month->month()]->add($budget_item);

                    if (
                        $budget_item->disabled() === false &&
                        $this->months[$month->year() . '-' . $month->month()]->future() === true
                    ) {
                        if ($budget_item->category() === 'income' && $budget_item->paid() === false) {
                            if (array_key_exists($budget_item->account(), $this->accounts)) {
                                $this->accounts[$budget_item->account()]->add($budget_item->amount());
                            }
                        } else {
                            if ($budget_item->category() === 'savings' && $budget_item->paid() === false) {
                                if (
                                    array_key_exists($budget_item->account(), $this->accounts) &&
                                    array_key_exists($budget_item->targetAccount(), $this->accounts)
                                ) {
                                    $this->accounts[$budget_item->account()]->sub($budget_item->amount());
                                    $this->accounts[$budget_item->targetAccount()]->add(
                                        $budget_item->amount()
                                    );
                                }
                            } else {
                                if (array_key_exists($budget_item->account(), $this->accounts) && $budget_item->paid() === false) {
                                    $this->accounts[$budget_item->account()]->sub($budget_item->amount());
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function account(string $id): Account
    {
        return $this->accounts[$id];
    }
}
