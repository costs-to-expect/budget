<?php

namespace Tests\Feature;

use App\Service\Budget\Service;
use DateTimeImmutable;
use DateTimeZone;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BudgetTestAccountTest extends TestCase
{
    use WithFaker;

    public function testMonthlyIncomeAddedToBalance(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 0, 1000);
        $budget_item_amount = $this->faker->randomFloat(2, 0, 1000);

        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'balance' => $starting_balance
        ];

        $service = new Service();
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
                'amount' => $budget_item_amount,
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

        $this->assertEquals(
            round($starting_balance + ($budget_item_amount * 3), 2),
            $service->account($account_id)->projected()
        );
    }

    public function testMonthlyIncomeNotAddedToBalanceWhenExcluded(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 0, 1000);
        $budget_item_amount = $this->faker->randomFloat(2, 0, 1000);

        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'balance' => $starting_balance
        ];

        $service = new Service();
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
                'amount' => $budget_item_amount,
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

        $this->assertEquals(
            round($starting_balance + ($budget_item_amount * 2), 2),
            $service->account($account_id)->projected()
        );
    }

    public function testAnnualIncomeAddedToBalance(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 0, 1000);
        $budget_item_amount = $this->faker->randomFloat(2, 0, 1000);

        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'balance' => $starting_balance
        ];

        $service = new Service();
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
                'amount' => $budget_item_amount,
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
                    'type' => 'annually',
                    'day' => 10,
                    'month' => 9
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertEquals(
            round($starting_balance + $budget_item_amount, 2),
            $service->account($account_id)->projected()
        );
    }

    public function testMonthlyIncomeAddedToBalanceWithPagination(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 0, 1000);
        $budget_item_amount = $this->faker->randomFloat(2, 0, 1000);

        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'balance' => $starting_balance
        ];

        $service = new Service();
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
                'amount' => $budget_item_amount,
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

        $this->assertEquals(
            round($starting_balance + ($budget_item_amount * 5), 2),
            $service->account($account_id)->projected()
        );
    }

    public function testMonthlyIncomeNotAddedToBalanceWhenExcludedWithPagination(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 0, 1000);
        $budget_item_amount = $this->faker->randomFloat(2, 0, 1000);

        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'balance' => $starting_balance
        ];

        $service = new Service();
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
                'amount' => $budget_item_amount,
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

        $this->assertEquals(
            round($starting_balance + ($budget_item_amount * 4), 2),
            $service->account($account_id)->projected()
        );
    }

    public function testAnnualIncomeAddedToBalanceWithPagination(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 0, 1000);
        $budget_item_amount = $this->faker->randomFloat(2, 0, 1000);

        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'balance' => $starting_balance
        ];

        $service = new Service();
        $service->setNow(
            new DateTimeImmutable("2020-08-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->setPagination(9, 2021);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Salary',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => $budget_item_amount,
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
                    'type' => 'annually',
                    'day' => 10,
                    'month' => 8
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertEquals(
            round($starting_balance + ($budget_item_amount * 2), 2),
            $service->account($account_id)->projected()
        );
    }

    public function testMonthlyExpenseSubtractedFromBalance(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 1000, 5000);
        $budget_item_amount = $this->faker->randomFloat(2, 10, 1000);

        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'balance' => $starting_balance
        ];

        $service = new Service();
        $service->setNow(
            new DateTimeImmutable("2020-08-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Expense',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => $budget_item_amount,
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
                    'type' => 'monthly',
                    'day' => 10,
                    'exclusions' => []
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertEquals(
            round($starting_balance - ($budget_item_amount * 3), 2),
            $service->account($account_id)->projected()
        );
    }

    public function testMonthlyExpenseSubtractedFromBalanceWhenExcluded(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 1000, 5000);
        $budget_item_amount = $this->faker->randomFloat(2, 10, 1000);

        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'balance' => $starting_balance
        ];

        $service = new Service();
        $service->setNow(
            new DateTimeImmutable("2020-08-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Expense',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => $budget_item_amount,
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
                    'type' => 'monthly',
                    'day' => 10,
                    'exclusions' => [9]
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertEquals(
            round($starting_balance - ($budget_item_amount * 2), 2),
            $service->account($account_id)->projected()
        );
    }

    public function testAnnualExpenseSubtractedFromBalance(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 1000, 5000);
        $budget_item_amount = $this->faker->randomFloat(2, 10, 2000);

        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'balance' => $starting_balance
        ];

        $service = new Service();
        $service->setNow(
            new DateTimeImmutable("2020-08-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Expense',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => $budget_item_amount,
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
                    'month' => 10
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertEquals(
            round($starting_balance - $budget_item_amount, 2),
            $service->account($account_id)->projected()
        );
    }

    public function testMonthlyExpenseSubtractedFromBalanceWithPagination(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 1000, 5000);
        $budget_item_amount = $this->faker->randomFloat(2, 10, 1000);

        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'balance' => $starting_balance
        ];

        $service = new Service();
        $service->setNow(
            new DateTimeImmutable("2020-08-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->setPagination(11, 2020);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Expense',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => $budget_item_amount,
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
                    'type' => 'monthly',
                    'day' => 10,
                    'exclusions' => []
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertEquals(
            round($starting_balance - ($budget_item_amount * 6), 2),
            $service->account($account_id)->projected()
        );
    }

    public function testMonthlyExpenseSubtractedFromBalanceWhenExcludedWithPagination(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 1000, 5000);
        $budget_item_amount = $this->faker->randomFloat(2, 10, 1000);

        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'balance' => $starting_balance
        ];

        $service = new Service();
        $service->setNow(
            new DateTimeImmutable("2020-08-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->setPagination(12, 2020);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Expense',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => $budget_item_amount,
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
                    'type' => 'monthly',
                    'day' => 10,
                    'exclusions' => [9, 10]
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertEquals(
            round($starting_balance - ($budget_item_amount * 5), 2),
            $service->account($account_id)->projected()
        );
    }

    public function testAnnualExpenseSubtractedFromBalanceWithPagination(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 1000, 5000);
        $budget_item_amount = $this->faker->randomFloat(2, 10, 2000);

        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'balance' => $starting_balance
        ];

        $service = new Service();
        $service->setNow(
            new DateTimeImmutable("2020-08-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->setPagination(10, 2021);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Expense',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => $budget_item_amount,
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
                    'month' => 10
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertEquals(
            round($starting_balance - ($budget_item_amount * 2), 2),
            $service->account($account_id)->projected()
        );
    }

    public function testBalanceGoingNegative(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = 0;
        $budget_item_amount = $this->faker->randomFloat(2, 10, 1000);

        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'balance' => $starting_balance
        ];

        $service = new Service();
        $service->setNow(
            new DateTimeImmutable("2020-08-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Expense',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => $budget_item_amount,
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
                    'type' => 'monthly',
                    'day' => 10,
                    'exclusions' => []
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertEquals(
            round($starting_balance - ($budget_item_amount * 3), 2),
            $service->account($account_id)->projected()
        );
    }

    public function testBalanceGoingNegativeWithPagination(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = 0;
        $budget_item_amount = $this->faker->randomFloat(2, 10, 1000);

        $account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $account_id,
            'name' => 'Default',
            'balance' => $starting_balance
        ];

        $service = new Service();
        $service->setNow(
            new DateTimeImmutable("2020-08-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->setPagination(1, 2021);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Expense',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => $budget_item_amount,
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
                    'type' => 'monthly',
                    'day' => 10,
                    'exclusions' => []
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertEquals(
            round($starting_balance - ($budget_item_amount * 8), 2),
            $service->account($account_id)->projected()
        );
    }

    public function testMonthlySavingTransferredToSavingsBalance(): void
    {
        $default_account_id = $this->faker->uuid();
        $savings_account_id = $this->faker->uuid();
        $starting_account_balance = $this->faker->randomFloat(2, 0, 1000);
        $starting_saving_balance = $this->faker->randomFloat(2, 0, 1000);

        $savings_item_amount = $this->faker->randomFloat(2, 0, 1000);

        $default_account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $default_account_id,
            'name' => 'Default',
            'balance' => $starting_account_balance
        ];
        $savings_account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'savings',
            'id' => $savings_account_id,
            'name' => 'Savings',
            'balance' => $starting_saving_balance
        ];

        $service = new Service();
        $service->setNow(
            new DateTimeImmutable("2020-08-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$default_account, $savings_account]);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Savings',
                'account' => $default_account_id,
                'target_account' => $savings_account_id,
                'description' => 'This is a description for the expense',
                'amount' => $savings_item_amount,
                "currency" => [
                    "id" => "epMqeYqPkL",
                    "name" => "Sterling",
                    "code" => "GBP",
                    "uri" => "/v3/currencies/epMqeYqPkL",
                ],
                'category' => 'savings',
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

        $this->assertEquals(
            round($starting_account_balance - ($savings_item_amount * 3), 2),
            $service->account($default_account_id)->projected()
        );

        $this->assertEquals(
            round($starting_saving_balance + ($savings_item_amount * 3), 2),
            $service->account($savings_account_id)->projected()
        );
    }

    public function testMonthlySavingTransferredToSavingsBalanceWhenExcluded(): void
    {
        $default_account_id = $this->faker->uuid();
        $savings_account_id = $this->faker->uuid();
        $starting_account_balance = $this->faker->randomFloat(2, 0, 1000);
        $starting_saving_balance = $this->faker->randomFloat(2, 0, 1000);

        $savings_item_amount = $this->faker->randomFloat(2, 0, 1000);

        $default_account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $default_account_id,
            'name' => 'Default',
            'balance' => $starting_account_balance
        ];
        $savings_account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'savings',
            'id' => $savings_account_id,
            'name' => 'Savings',
            'balance' => $starting_saving_balance
        ];

        $service = new Service();
        $service->setNow(
            new DateTimeImmutable("2020-08-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$default_account, $savings_account]);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Savings',
                'account' => $default_account_id,
                'target_account' => $savings_account_id,
                'description' => 'This is a description for the expense',
                'amount' => $savings_item_amount,
                "currency" => [
                    "id" => "epMqeYqPkL",
                    "name" => "Sterling",
                    "code" => "GBP",
                    "uri" => "/v3/currencies/epMqeYqPkL",
                ],
                'category' => 'savings',
                'start_date' => '2020-08-01',
                'end_date' => null,
                'disabled' => false,
                'frequency' => [
                    'type' => 'monthly',
                    'day' => 10,
                    'exclusions' => [
                        9
                    ]
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertEquals(
            round($starting_account_balance - ($savings_item_amount * 2), 2),
            $service->account($default_account_id)->projected()
        );

        $this->assertEquals(
            round($starting_saving_balance + ($savings_item_amount * 2), 2),
            $service->account($savings_account_id)->projected()
        );
    }

    public function testAnnualSavingTransferredToSavingsBalance(): void
    {
        $default_account_id = $this->faker->uuid();
        $savings_account_id = $this->faker->uuid();
        $starting_account_balance = $this->faker->randomFloat(2, 0, 1000);
        $starting_saving_balance = $this->faker->randomFloat(2, 0, 1000);

        $savings_item_amount = $this->faker->randomFloat(2, 0, 1000);

        $default_account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $default_account_id,
            'name' => 'Default',
            'balance' => $starting_account_balance
        ];
        $savings_account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'savings',
            'id' => $savings_account_id,
            'name' => 'Savings',
            'balance' => $starting_saving_balance
        ];

        $service = new Service();
        $service->setNow(
            new DateTimeImmutable("2020-08-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$default_account, $savings_account]);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Savings',
                'account' => $default_account_id,
                'target_account' => $savings_account_id,
                'description' => 'This is a description for the expense',
                'amount' => $savings_item_amount,
                "currency" => [
                    "id" => "epMqeYqPkL",
                    "name" => "Sterling",
                    "code" => "GBP",
                    "uri" => "/v3/currencies/epMqeYqPkL",
                ],
                'category' => 'savings',
                'start_date' => '2020-08-01',
                'end_date' => null,
                'disabled' => false,
                'frequency' => [
                    'type' => 'annually',
                    'day' => 10,
                    'month' => 8
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertEquals(
            round($starting_account_balance - $savings_item_amount, 2),
            $service->account($default_account_id)->projected()
        );

        $this->assertEquals(
            round($starting_saving_balance + $savings_item_amount, 2),
            $service->account($savings_account_id)->projected()
        );
    }

    public function testMonthlySavingTransferredToSavingsBalanceWithPagination(): void
    {
        $default_account_id = $this->faker->uuid();
        $savings_account_id = $this->faker->uuid();
        $starting_account_balance = $this->faker->randomFloat(2, 0, 1000);
        $starting_saving_balance = $this->faker->randomFloat(2, 0, 1000);

        $savings_item_amount = $this->faker->randomFloat(2, 0, 1000);

        $default_account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $default_account_id,
            'name' => 'Default',
            'balance' => $starting_account_balance
        ];
        $savings_account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'savings',
            'id' => $savings_account_id,
            'name' => 'Savings',
            'balance' => $starting_saving_balance
        ];

        $service = new Service();
        $service->setNow(
            new DateTimeImmutable("2020-08-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$default_account, $savings_account]);
        $service->setPagination(11, 2020);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Savings',
                'account' => $default_account_id,
                'target_account' => $savings_account_id,
                'description' => 'This is a description for the expense',
                'amount' => $savings_item_amount,
                "currency" => [
                    "id" => "epMqeYqPkL",
                    "name" => "Sterling",
                    "code" => "GBP",
                    "uri" => "/v3/currencies/epMqeYqPkL",
                ],
                'category' => 'savings',
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

        $this->assertEquals(
            round($starting_account_balance - ($savings_item_amount * 6), 2),
            $service->account($default_account_id)->projected()
        );

        $this->assertEquals(
            round($starting_saving_balance + ($savings_item_amount * 6), 2),
            $service->account($savings_account_id)->projected()
        );
    }

    public function testMonthlySavingTransferredToSavingsBalanceWhenExcludedWithPagination(): void
    {
        $default_account_id = $this->faker->uuid();
        $savings_account_id = $this->faker->uuid();
        $starting_account_balance = $this->faker->randomFloat(2, 0, 1000);
        $starting_saving_balance = $this->faker->randomFloat(2, 0, 1000);

        $savings_item_amount = $this->faker->randomFloat(2, 0, 1000);

        $default_account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $default_account_id,
            'name' => 'Default',
            'balance' => $starting_account_balance
        ];
        $savings_account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'savings',
            'id' => $savings_account_id,
            'name' => 'Savings',
            'balance' => $starting_saving_balance
        ];

        $service = new Service();
        $service->setNow(
            new DateTimeImmutable("2020-08-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$default_account, $savings_account]);
        $service->setPagination(11, 2020);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Savings',
                'account' => $default_account_id,
                'target_account' => $savings_account_id,
                'description' => 'This is a description for the expense',
                'amount' => $savings_item_amount,
                "currency" => [
                    "id" => "epMqeYqPkL",
                    "name" => "Sterling",
                    "code" => "GBP",
                    "uri" => "/v3/currencies/epMqeYqPkL",
                ],
                'category' => 'savings',
                'start_date' => '2020-08-01',
                'end_date' => null,
                'disabled' => false,
                'frequency' => [
                    'type' => 'monthly',
                    'day' => 10,
                    'exclusions' => [
                        9
                    ]
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertEquals(
            round($starting_account_balance - ($savings_item_amount * 5), 2),
            $service->account($default_account_id)->projected()
        );

        $this->assertEquals(
            round($starting_saving_balance + ($savings_item_amount * 5), 2),
            $service->account($savings_account_id)->projected()
        );
    }

    public function testAnnualSavingTransferredToSavingsBalanceWithPagination(): void
    {
        $default_account_id = $this->faker->uuid();
        $savings_account_id = $this->faker->uuid();
        $starting_account_balance = $this->faker->randomFloat(2, 0, 1000);
        $starting_saving_balance = $this->faker->randomFloat(2, 0, 1000);

        $savings_item_amount = $this->faker->randomFloat(2, 0, 1000);

        $default_account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => $default_account_id,
            'name' => 'Default',
            'balance' => $starting_account_balance
        ];
        $savings_account = [
            'currency' => [
                'id' => 1,
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'savings',
            'id' => $savings_account_id,
            'name' => 'Savings',
            'balance' => $starting_saving_balance
        ];

        $service = new Service();
        $service->setNow(
            new DateTimeImmutable("2020-08-01", new DateTimeZone('UTC'))
        );
        $service->setAccounts([$default_account, $savings_account]);
        $service->setPagination(7, 2021);
        $service->create();
        $service->addItem(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Savings',
                'account' => $default_account_id,
                'target_account' => $savings_account_id,
                'description' => 'This is a description for the expense',
                'amount' => $savings_item_amount,
                "currency" => [
                    "id" => "epMqeYqPkL",
                    "name" => "Sterling",
                    "code" => "GBP",
                    "uri" => "/v3/currencies/epMqeYqPkL",
                ],
                'category' => 'savings',
                'start_date' => '2020-08-01',
                'end_date' => null,
                'disabled' => false,
                'frequency' => [
                    'type' => 'annually',
                    'day' => 10,
                    'month' => 8
                ]
            ]
        );

        $service->assignItemsToBudget();

        $this->assertEquals(
            round($starting_account_balance - ($savings_item_amount * 2), 2),
            $service->account($default_account_id)->projected()
        );

        $this->assertEquals(
            round($starting_saving_balance + ($savings_item_amount * 2), 2),
            $service->account($savings_account_id)->projected()
        );
    }
}
