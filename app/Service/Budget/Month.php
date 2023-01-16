<?php

declare(strict_types=1);

namespace App\Service\Budget;

use DateTimeImmutable;
use DateTimeZone;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Month
{
    private \DateTimeImmutable $date;

    /** @var Item[] */
    private array $items = [];

    /**
     * @throws \Exception
     */
    public function __construct(
        private readonly DateTimeZone $timezone,
        private readonly int $month,
        private readonly int $year,
        private readonly array $currency,
        private readonly bool $visible,
        private readonly bool $now = false,
        private readonly bool $future = true
    )
    {
        $this->date = new DateTimeImmutable("{$this->year}-{$this->month}-01", $this->timezone);
    }

    public function add(Item $item): void
    {
        $this->items[] = $item;
    }

    public function currency(): array
    {
        return $this->currency;
    }

    public function days(): int
    {
        return (int) $this->date->format('t');
    }

    public function future(): bool
    {
        return $this->future;
    }

    public function items(): array
    {
        return $this->items;
    }

    public function leapYear(): bool
    {
        return (bool) $this->date->format('L');
    }

    public function month(): int
    {
        return $this->month;
    }

    public function name(): string
    {
        return $this->date->format('F');
    }

    public function now(): bool
    {
        return $this->now;
    }

    public function summary(): array
    {
        $summaries = [
            'total' => 0,
            'categories' => [
                'fixed' => [
                    'total' => 0
                ],
                'flexible' => [
                    'total' => 0
                ],
                'savings' => [
                    'total' => 0
                ],
            ]
        ];

        foreach ($this->items as $item) {
            if ($item->disabled() === false && $item->category() !== 'income') {
                $summaries['total'] += $item->amount();
                $summaries['categories'][$item->category()]['total'] += $item->amount();
            }
        }

        foreach (['fixed', 'flexible'] as $category) {
            if ($summaries['categories'][$category]['total'] !== 0) {
                $summaries['categories'][$category]['percentage'] = round(($summaries['categories'][$category]['total'] / $summaries['total']) * 100);
            } else {
                $summaries['categories'][$category]['percentage'] = 0;
            }
        }

        $summaries['categories']['savings']['percentage'] = 100 - $summaries['categories']['fixed']['percentage'] - $summaries['categories']['flexible']['percentage'];

        return $summaries;
    }

    public function totalExpense(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            if ($item->disabled() === false && $item->category() !== 'income') {
                $total += $item->amount();
            }
        }

        return (float) $total;
    }

    public function totalExpensePerAccount(): array
    {
        $expense = [];
        foreach ($this->items() as $item) {
            if ($item->disabled() === false && $item->category() !== 'income') {
                if (array_key_exists($item->account(), $expense) !== true) {
                    $expense[$item->account()] = [
                        'name' => $item->accountName(),
                        'total' => 0.0
                    ];
                }
                $expense[$item->account()]['total'] += $item->amount();
            }
        }

        return $expense;
    }

    public function totalIncome(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            if ($item->disabled() === false && $item->category() === 'income') {
                $total += $item->amount();
            }
        }

        return (float) $total;
    }

    public function totalIncomePerAccount(): array
    {
        $income = [];
        foreach ($this->items() as $item) {
            if ($item->disabled() === false && $item->category() === 'income') {
                if (array_key_exists($item->account(), $income) !== true) {
                    $income[$item->account()] = [
                        'name' => $item->accountName(),
                        'total' => 0.0
                    ];
                }
                $income[$item->account()]['total'] += $item->amount();
            }
        }

        return $income;
    }

    public function visible(): bool
    {
        return $this->visible;
    }

    public function year(): int
    {
        return $this->year;
    }
}
