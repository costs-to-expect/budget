<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BudgetItemTest extends TestCase
{
    use WithFaker;

    public function testMonthlyItemAddedToAllMonths()
    {
        $account_id = $this->faker->uuid();
        $account = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $account_id, 'name' => 'Default','balance' => 1254.36,];

        $service = new \App\Service\Budget\Service();
        $service->setNow(
            new \DateTimeImmutable( "2020-08-01", new \DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->setUp();
        $service->add(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Salary',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 1866.00,
                'currency_code' => 'GBP',
                'category' => 'income',
                'start_date' => '2020-08-01',
                'end_date' => null,
                'disabled' => false,
                'frequency' => [
                    'type' => 'monthly',
                    'day' => 10,
                    'exclusions' => []
                ]
            ]
        );

        $service->allocatedItemsToMonths();

        $this->assertCount(3, $service->months());
        foreach ($service->months() as $month) {
            $this->assertCount(1, $month->items());
        }
    }
}
