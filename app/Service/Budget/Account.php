<?php

declare(strict_types=1);

namespace App\Service\Budget;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Account
{
    private float $balance;

    private float $projected;

    public function __construct(
        private readonly string $id,
        private readonly string $name,
        private readonly string $type,
        private readonly array $currency,
        float $start,
        private readonly ?string $description = null,
        private readonly ?string $color = null
    )
    {
        $this->balance = $start;
        $this->projected = $start;
    }

    public function add(float $amount) : void
    {
        $this->projected += $amount;
    }

    public function balance() : float
    {
        return $this->balance;
    }

    public function color() : string
    {
        if ($this->color !== null) {
            return $this->color;
        }

        return '#' . dechex(random_int(0, 16777215));
    }

    public function currency() : array
    {
        return $this->currency;
    }

    public function currencyId() : string
    {
        return $this->currency['id'];
    }

    public function currencyCode() : string
    {
        return $this->currency['code'];
    }

    public function currencyName() : string
    {
        return $this->currency['name'];
    }

    public function description() : ?string
    {
        return $this->description;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function sub(float $amount) : void
    {
        $this->projected -= $amount;
    }

    public function name() : string
    {
        return $this->name;
    }

    public function projected(): float
    {
        return round($this->projected, 2);
    }

    public function type(): string
    {
        return $this->type;
    }
}
