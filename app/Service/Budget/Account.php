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
        private readonly string $type,
        private readonly string $name,
        float $start,
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

    public function type(): string
    {
        return $this->type;
    }
}
