<?php

namespace Tests\Feature;

use App\Service\Budget\Service;
use DateTimeImmutable;
use DateTimeZone;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BudgetItemTest extends TestCase
{
    use WithFaker;

    public function testMonthlyItemAddedToAllMonths(): void
    {
        $account_id = $this->faker->uuid();
        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'description' => null,
            'balance' => 1254.36,
        ];

        $service = new Service(new DateTimeZone('UTC'));
        $service->setNow(
            new DateTimeImmutable("2020-08-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Salary',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 1866.00,
                "currency" => [
                    "id" => "epMqeYqPkL",
                    "name" => "Sterling",
                    "code" => "GBP",
                    "uri" => "/v3/currencies/epMqeYqPkL",
                ],
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

        $service->assignItemsToBudget();

        $this->assertCount(3, $service->months());
        foreach ($service->months() as $month) {
            $this->assertCount(1, $month->items());
        }
    }

    public function testMonthlyItemAddedToAOnlyRelevantMonths(): void
    {
        $account_id = $this->faker->uuid();
        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'description' => null,
            'balance' => 1254.36,
        ];

        $service = new Service(new DateTimeZone('UTC'));
        $service->setNow(
            new DateTimeImmutable("2020-08-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Salary',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 1866.00,
                "currency" => [
                    "id" => "epMqeYqPkL",
                    "name" => "Sterling",
                    "code" => "GBP",
                    "uri" => "/v3/currencies/epMqeYqPkL",
                ],
                'category' => 'income',
                'start_date' => '2020-09-01',
                'end_date' => null,
                'disabled' => false,
                'frequency' => [
                    'type' => 'monthly',
                    'day' => 10,
                    'exclusions' => []
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertCount(3, $service->months());

        $this->assertCount(0, $service->months()['2020-8']->items());
        $this->assertCount(1, $service->months()['2020-9']->items());
        $this->assertCount(1, $service->months()['2020-10']->items());
    }

    public function testMonthlyItemAddedToAllMonthsWithPagination(): void
    {
        $account_id = $this->faker->uuid();
        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'description' => null,
            'balance' => 1254.36,
        ];

        $service = new Service(new DateTimeZone('UTC'));
        $service->setNow(
            new DateTimeImmutable("2020-08-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->setPagination(12, 2020);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Salary',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 1866.00,
                "currency" => [
                    "id" => "epMqeYqPkL",
                    "name" => "Sterling",
                    "code" => "GBP",
                    "uri" => "/v3/currencies/epMqeYqPkL",
                ],
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

        $service->assignItemsToBudget();

        $this->assertCount(7, $service->months());
        foreach ($service->months() as $month) {
            $this->assertCount(1, $month->items());
        }
    }

    public function testMonthlyItemAddedToAOnlyRelevantMonthsWithPagination(): void
    {
        $account_id = $this->faker->uuid();
        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'description' => null,
            'balance' => 1254.36,
        ];

        $service = new Service(new DateTimeZone('UTC'));
        $service->setNow(
            new DateTimeImmutable("2020-08-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->setPagination(10, 2020);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Salary',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 1866.00,
                "currency" => [
                    "id" => "epMqeYqPkL",
                    "name" => "Sterling",
                    "code" => "GBP",
                    "uri" => "/v3/currencies/epMqeYqPkL",
                ],
                'category' => 'income',
                'start_date' => '2020-09-01',
                'end_date' => null,
                'disabled' => false,
                'frequency' => [
                    'type' => 'monthly',
                    'day' => 10,
                    'exclusions' => []
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertCount(5, $service->months());

        $this->assertCount(0, $service->months()['2020-8']->items());
        $this->assertCount(1, $service->months()['2020-9']->items());
        $this->assertCount(1, $service->months()['2020-10']->items());
        $this->assertCount(1, $service->months()['2020-11']->items());
        $this->assertCount(1, $service->months()['2020-12']->items());
    }

    public function testAnnualItemAddedNotAddedToMonths(): void
    {
        $account_id = $this->faker->uuid();
        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'description' => null,
            'balance' => 1254.36,
        ];

        $service = new Service(new DateTimeZone('UTC'));
        $service->setNow(
            new DateTimeImmutable("2020-05-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Car Insurance',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 650.00,
                "currency" => [
                    "id" => "epMqeYqPkL",
                    "name" => "Sterling",
                    "code" => "GBP",
                    "uri" => "/v3/currencies/epMqeYqPkL",
                ],
                'category' => 'expense',
                'start_date' => '2020-08-01',
                'end_date' => null,
                'disabled' => false,
                'frequency' => [
                    'type' => 'annually',
                    'day' => 5,
                    'month' => 8
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertCount(3, $service->months());
        foreach ($service->months() as $month) {
            $this->assertCount(0, $month->items());
        }
    }

    public function testAnnualItemAddedNotAddedToMonthsWithPagination(): void
    {
        $account_id = $this->faker->uuid();
        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'description' => null,
            'balance' => 1254.36,
        ];

        $service = new Service(new DateTimeZone('UTC'));
        $service->setNow(
            new DateTimeImmutable("2020-02-01", new DateTimeZone('UTC'))
        );
        $service->setPagination(5, 2020);
        $service->setAccounts([$account]);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Car Insurance',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 650.00,
                "currency" => [
                    "id" => "epMqeYqPkL",
                    "name" => "Sterling",
                    "code" => "GBP",
                    "uri" => "/v3/currencies/epMqeYqPkL",
                ],
                'category' => 'expense',
                'start_date' => '2020-08-01',
                'end_date' => null,
                'disabled' => false,
                'frequency' => [
                    'type' => 'annually',
                    'day' => 5,
                    'month' => 8
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertCount(6, $service->months());
        foreach ($service->months() as $month) {
            $this->assertCount(0, $month->items());
        }
    }

    public function testAnnualItemAddedToRelevantMonth(): void
    {
        $account_id = $this->faker->uuid();
        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'description' => null,
            'balance' => 1254.36,
        ];

        $service = new Service(new DateTimeZone('UTC'));
        $service->setNow(
            new DateTimeImmutable("2020-05-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Car Insurance',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 650.00,
                "currency" => [
                    "id" => "epMqeYqPkL",
                    "name" => "Sterling",
                    "code" => "GBP",
                    "uri" => "/v3/currencies/epMqeYqPkL",
                ],
                'category' => 'expense',
                'start_date' => '2020-07-01',
                'end_date' => null,
                'disabled' => false,
                'frequency' => [
                    'type' => 'annually',
                    'day' => 5,
                    'month' => 7
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertCount(3, $service->months());
        $this->assertCount(0, $service->months()['2020-5']->items());
        $this->assertCount(0, $service->months()['2020-6']->items());
        $this->assertCount(1, $service->months()['2020-7']->items());
    }

    public function testAnnualItemAddedToRelevantMonthWithPagination(): void
    {
        $account_id = $this->faker->uuid();
        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'description' => null,
            'balance' => 1254.36,
        ];

        $service = new Service(new DateTimeZone('UTC'));
        $service->setNow(
            new DateTimeImmutable("2020-02-01", new DateTimeZone('UTC'))
        );
        $service->setPagination(5, 2020);
        $service->setAccounts([$account]);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Car Insurance',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 650.00,
                "currency" => [
                    "id" => "epMqeYqPkL",
                    "name" => "Sterling",
                    "code" => "GBP",
                    "uri" => "/v3/currencies/epMqeYqPkL",
                ],
                'category' => 'expense',
                'start_date' => '2020-07-01',
                'end_date' => null,
                'disabled' => false,
                'frequency' => [
                    'type' => 'annually',
                    'day' => 5,
                    'month' => 7
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertCount(6, $service->months());
        $this->assertCount(0, $service->months()['2020-2']->items());
        $this->assertCount(0, $service->months()['2020-3']->items());
        $this->assertCount(0, $service->months()['2020-4']->items());
        $this->assertCount(0, $service->months()['2020-5']->items());
        $this->assertCount(0, $service->months()['2020-6']->items());
        $this->assertCount(1, $service->months()['2020-7']->items());
    }

    public function testMonthlyItemAddedToAllMonthsExceptExclusions(): void
    {
        $account_id = $this->faker->uuid();
        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'description' => null,
            'balance' => 1254.36,
        ];

        $service = new Service(new DateTimeZone('UTC'));
        $service->setNow(
            new DateTimeImmutable("2020-08-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Salary',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 1866.00,
                "currency" => [
                    "id" => "epMqeYqPkL",
                    "name" => "Sterling",
                    "code" => "GBP",
                    "uri" => "/v3/currencies/epMqeYqPkL",
                ],
                'category' => 'income',
                'start_date' => '2020-08-01',
                'end_date' => null,
                'disabled' => false,
                'frequency' => [
                    'type' => 'monthly',
                    'day' => 10,
                    'exclusions' => [10]
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertCount(3, $service->months());
        $this->assertCount(1, $service->months()['2020-8']->items());
        $this->assertCount(1, $service->months()['2020-9']->items());
        $this->assertCount(0, $service->months()['2020-10']->items());
    }

    public function testMonthlyItemAddedToAllMonthsExceptExclusionsWithPagination(): void
    {
        $account_id = $this->faker->uuid();
        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'description' => null,
            'balance' => 1254.36,
        ];

        $service = new Service(new DateTimeZone('UTC'));
        $service->setNow(
            new DateTimeImmutable("2020-08-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->setPagination(11, 2020);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Salary',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 1866.00,
                "currency" => [
                    "id" => "epMqeYqPkL",
                    "name" => "Sterling",
                    "code" => "GBP",
                    "uri" => "/v3/currencies/epMqeYqPkL",
                ],
                'category' => 'income',
                'start_date' => '2020-08-01',
                'end_date' => null,
                'disabled' => false,
                'frequency' => [
                    'type' => 'monthly',
                    'day' => 10,
                    'exclusions' => [10, 11]
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertCount(6, $service->months());
        $this->assertCount(1, $service->months()['2020-8']->items());
        $this->assertCount(1, $service->months()['2020-9']->items());
        $this->assertCount(0, $service->months()['2020-10']->items());
        $this->assertCount(0, $service->months()['2020-11']->items());
        $this->assertCount(1, $service->months()['2020-12']->items());
        $this->assertCount(1, $service->months()['2021-1']->items());
    }
}
