<?php

namespace Tests\Feature;

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

        $account = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $account_id, 'name' => 'Default','balance' => $starting_balance];

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
                'amount' => $budget_item_amount,
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

        $this->assertEquals(
            $starting_balance + ($budget_item_amount * 3),
            $service->account($account_id)->projected()
        );
    }
    public function testMonthlyIncomeNotAddedToBalanceWhenExcluded(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 0, 1000);
        $budget_item_amount = $this->faker->randomFloat(2, 0, 1000);

        $account = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $account_id, 'name' => 'Default','balance' => $starting_balance];

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
                'amount' => $budget_item_amount,
                'currency_code' => 'GBP',
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

        $service->allocatedItemsToMonths();

        $this->assertEquals(
            $starting_balance + ($budget_item_amount * 2),
            $service->account($account_id)->projected()
        );
    }
    public function testAnnualIncomeAddedToBalance(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 0, 1000);
        $budget_item_amount = $this->faker->randomFloat(2, 0, 1000);

        $account = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $account_id, 'name' => 'Default','balance' => $starting_balance];

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
                'amount' => $budget_item_amount,
                'currency_code' => 'GBP',
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

        $service->allocatedItemsToMonths();

        $this->assertEquals(
            $starting_balance + $budget_item_amount,
            $service->account($account_id)->projected()
        );
    }

    public function testMonthlyIncomeAddedToBalanceWithPagination(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 0, 1000);
        $budget_item_amount = $this->faker->randomFloat(2, 0, 1000);

        $account = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $account_id, 'name' => 'Default','balance' => $starting_balance];

        $service = new \App\Service\Budget\Service();
        $service->setNow(
            new \DateTimeImmutable( "2020-08-01", new \DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->setPagination(10, 2020);
        $service->setUp();
        $service->add(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Salary',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => $budget_item_amount,
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

        $this->assertEquals(
            $starting_balance + ($budget_item_amount * 5),
            $service->account($account_id)->projected()
        );
    }
    public function testMonthlyIncomeNotAddedToBalanceWhenExcludedWithPagination(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 0, 1000);
        $budget_item_amount = $this->faker->randomFloat(2, 0, 1000);

        $account = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $account_id, 'name' => 'Default','balance' => $starting_balance];

        $service = new \App\Service\Budget\Service();
        $service->setNow(
            new \DateTimeImmutable( "2020-08-01", new \DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->setPagination(11, 2020);
        $service->setUp();
        $service->add(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Salary',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => $budget_item_amount,
                'currency_code' => 'GBP',
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

        $service->allocatedItemsToMonths();

        $this->assertEquals(
            $starting_balance + ($budget_item_amount * 4),
            $service->account($account_id)->projected()
        );
    }
    public function testAnnualIncomeAddedToBalanceWithPagination(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 0, 1000);
        $budget_item_amount = $this->faker->randomFloat(2, 0, 1000);

        $account = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $account_id, 'name' => 'Default','balance' => $starting_balance];

        $service = new \App\Service\Budget\Service();
        $service->setNow(
            new \DateTimeImmutable( "2020-08-01", new \DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->setPagination(9, 2021);
        $service->setUp();
        $service->add(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Salary',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => $budget_item_amount,
                'currency_code' => 'GBP',
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

        $service->allocatedItemsToMonths();

        $this->assertEquals(
            $starting_balance + ($budget_item_amount * 2),
            $service->account($account_id)->projected()
        );
    }

    public function testMonthlyExpenseSubtractedFromBalance(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 1000, 5000);
        $budget_item_amount = $this->faker->randomFloat(2, 10, 1000);

        $account = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $account_id, 'name' => 'Default','balance' => $starting_balance];

        $service = new \App\Service\Budget\Service();
        $service->setNow(
            new \DateTimeImmutable( "2020-08-01", new \DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->setUp();
        $service->add(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Expense',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => $budget_item_amount,
                'currency_code' => 'GBP',
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

        $service->allocatedItemsToMonths();

        $this->assertEquals(
            $starting_balance - ($budget_item_amount * 3),
            $service->account($account_id)->projected()
        );
    }
    public function testMonthlyExpenseSubtractedFromBalanceWhenExcluded(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 1000, 5000);
        $budget_item_amount = $this->faker->randomFloat(2, 10, 1000);

        $account = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $account_id, 'name' => 'Default','balance' => $starting_balance];

        $service = new \App\Service\Budget\Service();
        $service->setNow(
            new \DateTimeImmutable( "2020-08-01", new \DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->setUp();
        $service->add(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Expense',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => $budget_item_amount,
                'currency_code' => 'GBP',
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

        $service->allocatedItemsToMonths();

        $this->assertEquals(
            $starting_balance - ($budget_item_amount * 2),
            $service->account($account_id)->projected()
        );
    }
    public function testAnnualExpenseSubtractedFromBalance(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 1000, 5000);
        $budget_item_amount = $this->faker->randomFloat(2, 10, 2000);

        $account = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $account_id, 'name' => 'Default','balance' => $starting_balance];

        $service = new \App\Service\Budget\Service();
        $service->setNow(
            new \DateTimeImmutable( "2020-08-01", new \DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->setUp();
        $service->add(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Expense',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => $budget_item_amount,
                'currency_code' => 'GBP',
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

        $service->allocatedItemsToMonths();

        $this->assertEquals(
            $starting_balance - $budget_item_amount,
            $service->account($account_id)->projected()
        );
    }

    public function testMonthlyExpenseSubtractedFromBalanceWithPagination(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 1000, 5000);
        $budget_item_amount = $this->faker->randomFloat(2, 10, 1000);

        $account = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $account_id, 'name' => 'Default','balance' => $starting_balance];

        $service = new \App\Service\Budget\Service();
        $service->setNow(
            new \DateTimeImmutable( "2020-08-01", new \DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->setPagination(11, 2020);
        $service->setUp();
        $service->add(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Expense',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => $budget_item_amount,
                'currency_code' => 'GBP',
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

        $service->allocatedItemsToMonths();

        $this->assertEquals(
            $starting_balance - ($budget_item_amount * 6),
            $service->account($account_id)->projected()
        );
    }
    public function testMonthlyExpenseSubtractedFromBalanceWhenExcludedWithPagination(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 1000, 5000);
        $budget_item_amount = $this->faker->randomFloat(2, 10, 1000);

        $account = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $account_id, 'name' => 'Default','balance' => $starting_balance];

        $service = new \App\Service\Budget\Service();
        $service->setNow(
            new \DateTimeImmutable( "2020-08-01", new \DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->setPagination(12, 2020);
        $service->setUp();
        $service->add(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Expense',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => $budget_item_amount,
                'currency_code' => 'GBP',
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

        $service->allocatedItemsToMonths();

        $this->assertEquals(
            $starting_balance - ($budget_item_amount * 5),
            $service->account($account_id)->projected()
        );
    }
    public function testAnnualExpenseSubtractedFromBalanceWithPagination(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = $this->faker->randomFloat(2, 1000, 5000);
        $budget_item_amount = $this->faker->randomFloat(2, 10, 2000);

        $account = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $account_id, 'name' => 'Default','balance' => $starting_balance];

        $service = new \App\Service\Budget\Service();
        $service->setNow(
            new \DateTimeImmutable( "2020-08-01", new \DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->setPagination(10, 2021);
        $service->setUp();
        $service->add(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Expense',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => $budget_item_amount,
                'currency_code' => 'GBP',
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

        $service->allocatedItemsToMonths();

        $this->assertEquals(
            $starting_balance - ($budget_item_amount * 2),
            $service->account($account_id)->projected()
        );
    }

    public function testBalanceGoingNegative(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = 0;
        $budget_item_amount = $this->faker->randomFloat(2, 10, 1000);

        $account = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $account_id, 'name' => 'Default','balance' => $starting_balance];

        $service = new \App\Service\Budget\Service();
        $service->setNow(
            new \DateTimeImmutable( "2020-08-01", new \DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->setUp();
        $service->add(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Expense',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => $budget_item_amount,
                'currency_code' => 'GBP',
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

        $service->allocatedItemsToMonths();

        $this->assertEquals(
            $starting_balance - ($budget_item_amount * 3),
            $service->account($account_id)->projected()
        );
    }
    public function testBalanceGoingNegativeWithPagination(): void
    {
        $account_id = $this->faker->uuid();
        $starting_balance = 0;
        $budget_item_amount = $this->faker->randomFloat(2, 10, 1000);

        $account = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $account_id, 'name' => 'Default','balance' => $starting_balance];

        $service = new \App\Service\Budget\Service();
        $service->setNow(
            new \DateTimeImmutable( "2020-08-01", new \DateTimeZone('UTC'))
        );
        $service->setAccounts([$account]);
        $service->setPagination(1, 2021);
        $service->setUp();
        $service->add(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Expense',
                'account' => $account_id,
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => $budget_item_amount,
                'currency_code' => 'GBP',
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

        $service->allocatedItemsToMonths();

        $this->assertEquals(
            $starting_balance - ($budget_item_amount * 8),
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

        $default_account = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $default_account_id, 'name' => 'Default','balance' => $starting_account_balance];
        $savings_account = [ 'currency' => 'GBP', 'type' => 'savings', 'id' => $savings_account_id, 'name' => 'Savings','balance' => $starting_saving_balance];

        $service = new \App\Service\Budget\Service();
        $service->setNow(
            new \DateTimeImmutable( "2020-08-01", new \DateTimeZone('UTC'))
        );
        $service->setAccounts([$default_account, $savings_account]);
        $service->setUp();
        $service->add(
            [
                'id' => $this->faker->uuid(),
                'name' => 'Savings',
                'account' => $default_account_id,
                'target_account' => $savings_account_id,
                'description' => 'This is a description for the expense',
                'amount' => $savings_item_amount,
                'currency_code' => 'GBP',
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

        $service->allocatedItemsToMonths();

        $this->assertEquals(
            $starting_account_balance - ($savings_item_amount * 3),
            $service->account($default_account_id)->projected()
        );

        $this->assertEquals(
            $starting_saving_balance + ($savings_item_amount * 3),
            $service->account($savings_account_id)->projected()
        );

    }

    // Monthly saving removed from one account and added to another
    // Monthly saving not removed from one account and added to another when excluded
    // Annual saving removed from one account and added to another

    // Monthly saving removed from one account and added to another - Pagination
    // Monthly saving not removed from one account and added to another when excluded - Pagination
    // Annual saving removed from one account and added to another - Pagination

    // Monthly and annual expense subtracted from balance
    // Monthly and annual expense and Monthly income added and subtracted as expected

    // Monthly and annual expense subtracted from balance - Pagination
    // Monthly and annual expense and Monthly income added and subtracted as expected - Pagination
}
