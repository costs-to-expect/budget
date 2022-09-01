<?php

declare(strict_types=1);

namespace App\Service\Budget;

use DateTimeImmutable;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Month
{
    private \DateTimeImmutable $date;

    /** @var Item[] */
    private array $items = [];

    public function __construct(
        private readonly int $month,
        private readonly int $year
    )
    {
        $this->date = new DateTimeImmutable("{$this->year}-{$this->month}-01", new \DateTimeZone('UTC'));
    }

    public function add(Item $item): void
    {
        $this->items[] = $item;
    }

    public function days(): int
    {
        return (int) $this->date->format('t');
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

    public function year(): int
    {
        return $this->year;
    }
}
