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
    protected float $original_amount;
    protected array $currency;

    protected Period $frequency;

    protected string $category;

    protected string $account;

    protected ?string $target_account;

    protected bool $disabled;

    protected DateTimeImmutable $today;

    protected bool $paid = false;

    protected bool $has_adjustment = false;

    /**
     * @throws \Exception
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];

        $this->account = $data['account'];
        $this->target_account = $data['target_account'];

        $this->today = new \DateTimeImmutable('today', new \DateTimeZone('UTC'));

        $this->start_date = new \DateTimeImmutable($data['start_date'], new \DateTimeZone('UTC'));
        if ($data['end_date'] !== null) {
            $this->end_date = new \DateTimeImmutable($data['end_date'], new \DateTimeZone('UTC'));
        }

        $this->name = $data['name'];
        $this->description = $data['description'];

        $this->amount = (float) $data['amount'];
        $this->original_amount = $this->amount;
        $this->currency = $data['currency'];

        if ($data['frequency']['type'] === 'monthly') {
            $this->frequency = new Monthly(
                $data['frequency']['day'] ?? 15,
                $data['frequency']['exclusions']
            );
        }

        if ($data['frequency']['type'] === 'annually') {
            $this->frequency = new Annually(
                $data['frequency']['day'] ?? 15,
                $data['frequency']['month']
            );
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
            (
                $this->endDate() === null ||
                (
                    $this->endDate() >= $end_of_active_month ||
                    (
                        $this->endDate() > $start_of_active_month &&
                        $this->endDate() > $this->today
                    )
                )
            )
        );
    }

    private function activeForMonthMonthlyItem(int $days, int $month, int $year): bool
    {
        $start_of_active_month = new DateTimeImmutable("{$year}-{$month}-01", new \DateTimeZone('UTC'));
        $end_of_active_month = new DateTimeImmutable("{$year}-{$month}-{$days}", new \DateTimeZone('UTC'));

        return (
            in_array($month, $this->frequency()->exclusions(), true) === false &&
            $this->startDate() <= $end_of_active_month &&
            (
                $this->endDate() === null ||
                (
                    $this->endDate() >= $end_of_active_month ||
                    (
                        $this->endDate() > $start_of_active_month &&
                        $this->endDate() > $this->today
                    )
                )
            )
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

    public function currency(): array
    {
        return $this->currency;
    }

    public function currencyCode(): string
    {
        return $this->currency['code'];
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

    public function hasAdjustment(): bool
    {
        return $this->has_adjustment;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function originalAmount(): float
    {
        return $this->original_amount;
    }

    public function paid(): bool
    {
        return $this->paid;
    }

    public function progressBarPercentage(): int
    {
        return (new ProgressBar($this->amount))->percentage();
    }

    public function setAdjustment(float $adjustment): void
    {
        $this->has_adjustment = true;
        $this->original_amount = $this->amount;
        $this->amount = $adjustment;
    }

    public function setPaid(bool $paid): void
    {
        $this->paid = $paid;
    }

    public function startDate(): DateTimeImmutable
    {
        return $this->start_date;
    }

    public function targetAccount(): ?string
    {
        return $this->target_account;
    }
}
