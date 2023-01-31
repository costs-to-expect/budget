<?php

declare(strict_types=1);

namespace App\Service\Budget;

use Illuminate\Support\Facades\Config;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Settings
{
    private \DateTimeZone $dateTimeZone;

    public function __construct()
    {
        $this->dateTimeZone = new \DateTimeZone(Config::get('app.config.timezone'));
    }

    public function dateTimeZone(): \DateTimeZone
    {
        return $this->dateTimeZone;
    }

    public function defaultCurrency(): array
    {
        return [
            'id' => 'epMqeYqPkL',
            'code' => 'GBP',
            'name' => 'Sterling'
        ];
    }

    public function maxAccounts(): int
    {
        return 3;
    }

    public function maxItems(): int
    {
        return 100;
    }

    public function visibleMonths(): int
    {
        return 3;
    }
}
