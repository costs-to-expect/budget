<?php

declare(strict_types=1);

namespace App\Service\Budget;

use App\Service\Budget\Frequency\Annually;
use App\Service\Budget\Frequency\Monthly;
use App\Service\Budget\Frequency\Period;
use DateTimeImmutable;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Item
{
    protected string $name;
    protected ?string $description;

    protected DateTimeImmutable $start_date;
    protected ?DateTimeImmutable $end_date = null;

    protected float $amount;
    protected string $currency_code;

    protected Period $frequency;

    protected string $category;

    protected string $account;

    protected bool $disabled;

    public function __construct(array $data)
    {
        $this->account = $data['account'];

        $this->start_date = new \DateTimeImmutable($data['start_date'], new \DateTimeZone('UTC'));
        if ($data['end_date'] !== null) {
            $this->end_date = new DateTimeImmutable($data['end_date'], new \DateTimeZone('UTC'));
        }

        $this->name = $data['name'];
        $this->description = $data['description'];

        $this->amount = (float) $data['amount'];
        $this->currency_code = $data['currency_code'];

        if ($data['frequency']['type'] === 'monthly') {
            $this->frequency = new Monthly($data['frequency']['day'], $data['frequency']['exclusions']);
        }

        if ($data['frequency']['type'] === 'annually') {
            $this->frequency = new Annually($data['frequency']['day'], $data['frequency']['month']);
        }

        $this->category = $data['category'];

        $this->disabled = $data['disabled'];
    }

    public function account(): string
    {
        return $this->account;
    }

    public function active(): bool
    {
        return (
            $this->startDate() <= now() &&
            now() <= $this->endDate()
        );
    }

    public function activeForMonth(int $days, int $month, int $year): bool
    {
        switch ($this->frequency->type()) {
            case 'monthly':
                return $this->activeForMonthMonthlyItem($days, $month, $year);
            case 'annually':
                return $this->activeForMonthAnnualItem($days, $month, $year);
            default:
                abort(500, 'Unknown frequency type');
        }
    }

    private function activeForMonthAnnualItem(int $days, int $month, int $year): bool
    {
        $start_of_active_month = new DateTimeImmutable("{$year}-{$month}-01", new \DateTimeZone('UTC'));
        $end_of_active_month = new DateTimeImmutable("{$year}-{$month}-{$days}", new \DateTimeZone('UTC'));

        return (
            $this->frequency()->month() === $month &&
            $this->startDate() <= $end_of_active_month &&
            ($this->endDate() === null || $this->endDate() >= $end_of_active_month)
        );
    }

    private function activeForMonthMonthlyItem(int $days, int $month, int $year): bool
    {
        $start_of_active_month = new DateTimeImmutable("{$year}-{$month}-01", new \DateTimeZone('UTC'));
        $end_of_active_month = new DateTimeImmutable("{$year}-{$month}-{$days}", new \DateTimeZone('UTC'));

        return (
            $this->startDate() <= $end_of_active_month &&
            ($this->endDate() === null || $this->endDate() >= $end_of_active_month)
        );
    }

    public function amount(): float
    {
        return $this->amount;
    }

    public function category(): string
    {
        return $this->category;
    }

    public function currencyCode(): string
    {
        return $this->currency_code;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function disabled(): bool
    {
        return $this->disabled;
    }

    public function endDate(): ?DateTimeImmutable
    {
        return $this->end_date;
    }

    public function frequency(): Period
    {
        return $this->frequency;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function progressBarPercentage(): int
    {
        return (new ProgressBar($this->amount))->percentage();
    }

    public function startDate(): DateTimeImmutable
    {
        return $this->start_date;
    }
}
