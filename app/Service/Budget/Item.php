<?php

declare(strict_types=1);

namespace App\Service\Budget;

use App\Service\Budget\Frequency\Annually;
use App\Service\Budget\Frequency\Monthly;
use App\Service\Budget\Frequency\Period;
use DateTime;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Item
{
    protected string $name;
    protected ?string $description;

    protected DateTime $start_date;
    protected DateTime $end_date;

    protected float $amount;
    protected string $currency_code;

    protected Period $frequency;

    protected string $category;

    public function __construct(array $data)
    {
        $this->start_date = new DateTime($data['start_date'], new \DateTimeZone('UTC'));
        $this->end_date = new DateTime($data['end_date'], new \DateTimeZone('UTC'));

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
    }

    public function active(): bool
    {
        return (
            $this->startDate() <= now() &&
            now() <= $this->endDate()
        );
    }

    public function activeForMonth(int $month, int $year): bool
    {
        $start_of_active_month = new DateTime("{$year}-{$month}-01", new \DateTimeZone('UTC'));
        $end_of_active_month = clone $start_of_active_month;
        $end_of_active_month->modify('last day of this month');

        return (
            $this->startDate() <= $end_of_active_month &&
            $this->endDate() >= $start_of_active_month
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
        return false;
    }

    public function endDate(): DateTime
    {
        return new DateTime('2023-12-31');
    }

    public function frequency(): Period
    {
        return new Monthly(10, [2,3]);
    }

    public function name(): string
    {
        return $this->name;
    }

    public function progressBarPercentage(): int
    {
        return (new ProgressBar($this->amount))->percentage();
    }

    public function startDate(): DateTime
    {
        return new DateTime('2021-01-01');
    }
}
