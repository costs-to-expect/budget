<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BudgetTest extends TestCase
{
    use WithFaker;

    public function testGeneratedMonths(): void
    {
        $service = new \App\Service\Budget\Service();
        $service->setUp();

        $this->assertCount(3, $service->months());
    }

    public function testGeneratedMonthsWhenStartDateSet(): void
    {
        $service = new \App\Service\Budget\Service();
        $service->setNow(
            new \DateTimeImmutable( "2020-08-01", new \DateTimeZone('UTC'))
        );
        $service->setUp();

        $this->assertCount(3, $service->months());
    }

    public function testGeneratedMonthsWithYearWrap(): void
    {
        $service = new \App\Service\Budget\Service();
        $service->setNow(
            new \DateTimeImmutable( "2020-11-01", new \DateTimeZone('UTC'))
        );
        $service->setUp();

        $this->assertArrayHasKey('2020-11', $service->months());
        $this->assertArrayHasKey('2020-12', $service->months());
        $this->assertArrayHasKey('2021-1', $service->months());

        $this->assertCount(3, $service->months());

        $service = new \App\Service\Budget\Service();
        $service->setNow(
            new \DateTimeImmutable( "2020-12-01", new \DateTimeZone('UTC'))
        );
        $service->setUp();

        $this->assertArrayHasKey('2020-12', $service->months());
        $this->assertArrayHasKey('2021-1', $service->months());
        $this->assertArrayHasKey('2021-2', $service->months());

        $this->assertCount(3, $service->months());
    }

    public function testGeneratedMonthsPagintionOneMonth(): void
    {
        $service = new \App\Service\Budget\Service();
        $service->setNow(
            new \DateTimeImmutable( "2020-12-01", new \DateTimeZone('UTC'))
        );
        $service->setPagination(1, 2021);
        $service->setUp();

        $this->assertArrayHasKey('2020-12', $service->months());
        $this->assertArrayHasKey('2021-1', $service->months());
        $this->assertArrayHasKey('2021-2', $service->months());
        $this->assertArrayHasKey('2021-3', $service->months());

        $this->assertCount(4, $service->months());
    }

    public function testGeneratedMonthsPaginationWrapsFutureYear(): void
    {
        $service = new \App\Service\Budget\Service();
        $service->setNow(
            new \DateTimeImmutable( "2020-12-01", new \DateTimeZone('UTC'))
        );
        $service->setPagination(1, 2022);
        $service->setUp();

        $this->assertArrayNotHasKey('2020-11', $service->months());
        $this->assertArrayHasKey('2020-12', $service->months());
        $this->assertArrayHasKey('2022-3', $service->months());
        $this->assertArrayNotHasKey('2022-4', $service->months());

        $this->assertCount(16, $service->months());
    }

    public function testVewEndDate(): void
    {
        $service = new \App\Service\Budget\Service();
        $service->setNow(
            new \DateTimeImmutable( "2020-08-01", new \DateTimeZone('UTC'))
        );
        $service->setUp();

        $this->assertEquals('October', $service->viewEnd()['month']);
        $this->assertEquals(2020, $service->viewEnd()['year']);
    }

    public function testVewEndDateWithPagination(): void
    {
        $service = new \App\Service\Budget\Service();
        $service->setNow(
            new \DateTimeImmutable( "2020-08-01", new \DateTimeZone('UTC'))
        );
        $service->setPagination(2, 2021);
        $service->setUp();

        $this->assertEquals('April', $service->viewEnd()['month']);
        $this->assertEquals(2021, $service->viewEnd()['year']);
    }

    public function testGeneratedMonthsVisibility(): void
    {
        $service = new \App\Service\Budget\Service();
        $service->setUp();

        $this->assertCount(3, $service->months());

        foreach ($service->months() as $month) {
            $this->assertTrue($month->visible());
        }
    }

    public function testGeneratedMonthsVisibilityWithPagination(): void
    {
        $service = new \App\Service\Budget\Service();
        $service->setNow(
            new \DateTimeImmutable( "2022-08-01", new \DateTimeZone('UTC'))
        );
        $service->setPagination(10, 2022);
        $service->setUp();

        $this->assertCount(5, $service->months());

        $this->assertFalse($service->months()['2022-8']->visible());
        $this->assertFalse($service->months()['2022-9']->visible());
        $this->assertTrue($service->months()['2022-10']->visible());
        $this->assertTrue($service->months()['2022-11']->visible());
        $this->assertTrue($service->months()['2022-12']->visible());
    }

    public function testAccountCreated(): void
    {
        $service = new \App\Service\Budget\Service();
        $service->setAccounts([[
            'currency' => 'GBP',
            'type' => 'expense',
            'id' => $this->faker()->uuid(),
            'name' => 'Default',
            'balance' => 1254.36,
        ]]);
        $service->setUp();

        $this->assertCount(1, $service->accounts());
    }

    public function testAccountLimit(): void
    {
        $account_1 = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $this->faker()->uuid(), 'name' => $this->faker->name(),'balance' => 1254.36,];
        $account_2 = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $this->faker()->uuid(), 'name' => $this->faker->name(),'balance' => 1254.36,];
        $account_3 = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $this->faker()->uuid(), 'name' => $this->faker->name(),'balance' => 1254.36,];

        $service = new \App\Service\Budget\Service();
        $service->setAccounts([$account_1, $account_2, $account_3]);
        $service->setUp();

        $this->assertCount(3, $service->accounts());
    }

    public function testAccountLimitNotPassable(): void
    {
        $account_1 = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $this->faker()->uuid(), 'name' => $this->faker->name(),'balance' => 1254.36,];
        $account_2 = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $this->faker()->uuid(), 'name' => $this->faker->name(),'balance' => 1254.36,];
        $account_3 = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $this->faker()->uuid(), 'name' => $this->faker->name(),'balance' => 1254.36,];
        $account_4 = [ 'currency' => 'GBP', 'type' => 'expense', 'id' => $this->faker()->uuid(), 'name' => $this->faker->name(),'balance' => 1254.36,];

        $service = new \App\Service\Budget\Service();

        $this->expectException(\LengthException::class);
        $service->setAccounts([$account_1, $account_2, $account_3, $account_4]);
    }

    public function testAccountReturned()
    {
        $uuid = $this->faker->uuid();

        $account = [
            'currency' => 'GBP',
            'type' => 'expense',
            'id' => $uuid,
            'name' => 'Default',
            'balance' => 1254.36,
        ];

        $service = new \App\Service\Budget\Service();
        $service->setAccounts([$account]);
        $service->setUp();

        $this->assertCount(1, $service->accounts());
        $this->assertEquals('Default', $service->account($uuid)->name());
    }
}
