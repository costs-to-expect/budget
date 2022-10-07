<?php

namespace App\Jobs;

use App\Api\Service;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Throwable;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class LoadDemo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $resource_type_id;
    private string $resource_id;
    private string $bearer;

    public function __construct(
        string $resource_type_id,
        string $resource_id,
        string $bearer
    )
    {
        $this->resource_type_id = $resource_type_id;
        $this->resource_id = $resource_id;
        $this->bearer = $bearer;
    }

    public function handle()
    {
        $api = new Service($this->bearer);

        $this->confirmNoBudgetSetup($api);

        [$debit_id, $savings_id] = $this->createAccounts($api);

        $this->createBudgetItems($api, $debit_id, $savings_id);

        $this->setDemoFlag($api);
    }

    public function failed(Throwable $exception): void
    {

    }

    private function confirmNoBudgetSetup(Service $api): void
    {
        $resource = $api->getResource($this->resource_type_id, $this->resource_id);
        if ($resource['status'] !== 200) {
            throw new \Exception('Unable to fetch the resource, no Budget account');
        }

        $accounts = [];
        $data = $resource['content']['data'];
        if ((is_array($data) && array_key_exists('accounts', $data) === true)) {
            $accounts = $data['accounts'];
        }

        $budget_items_response = $api->getBudgetItems(
            $this->resource_type_id,
            $this->resource_id,
            [
                'limit' => 50,
                'sort' => 'amount:desc|created:asc'
            ]
        );
        if ($budget_items_response['status'] !== 200) {
            throw new \Exception('Unable to fetch the budget item collection, guessing no Budget account');
        }

        $budget_items = $budget_items_response['content'];

        $budget = new \App\Service\Budget\Service();
        $budget
            ->setAccounts($accounts)
            ->create();

        foreach ($budget_items as $budget_item) {
            $budget->addItem($budget_item);
        }

        $budget->assignItemsToBudget();

        if ($budget->hasAccounts() === true || $budget->hasBudget() === true) {
            throw new \Exception('User has some form of Budget setup, aborting');
        }
    }

    private function createAccounts(Service $api): array
    {
        $debit = [
            'currency' => [
                'id' => 'epMqeYqPkL',
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'expense',
            'id' => Str::uuid()->toString(),
            'name' => 'Default',
            'description' => null,
            'balance' => '2848.65'
        ];
        $savings = [
            'currency' => [
                'id' => 'epMqeYqPkL',
                'code' => 'GBP',
                'name' => 'Sterling'
            ],
            'type' => 'savings',
            'id' => Str::uuid()->toString(),
            'name' => 'Savings',
            'description' => null,
            'balance' => '219.54'
        ];

        $payload['accounts'] = [
            $debit['id'] => $debit,
            $savings['id'] => $savings
        ];

        try {
            $data = json_encode($payload, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw new \JsonException($e->getMessage());
        }

        $patch_resource_response = $api->patchResource(
            $this->resource_type_id,
            $this->resource_id,
            ['data' => $data]
        );

        if ($patch_resource_response['status'] !== 204) {
            throw new \Exception('Unable to patch the resource and create the demo accounts');
        }

        return [$debit['id'], $savings['id']];
    }

    private function createBudgetItems(Service $api, string $debit_id, string $savings_id): void
    {
        $monthly_frequency = [
            'type' => 'monthly',
            'day' => null,
            'exclusions' => [],
        ];
        try {
            $monthly_frequency_json = json_encode($monthly_frequency, JSON_THROW_ON_ERROR);
        } catch(\JsonException $e) {
            throw new \JsonException($e->getMessage());
        }

        $frequency_council_tax = [
            'type' => 'monthly',
            'day' => null,
            'exclusions' => [2, 3],
        ];
        try {
            $frequency_council_tax_json = json_encode($frequency_council_tax, JSON_THROW_ON_ERROR);
        } catch(\JsonException $e) {
            throw new \JsonException($e->getMessage());
        }

        $frequency_car_insurance = [
            'type' => 'annually',
            'day' => null,
            'month' => 3
        ];
        try {
            $frequency_car_insurance_json = json_encode($frequency_car_insurance, JSON_THROW_ON_ERROR);
        } catch(\JsonException $e) {
            throw new \JsonException($e->getMessage());
        }

        $frequency_water = [
            'type' => 'annually',
            'day' => null,
            'month' => 10
        ];
        try {
            $frequency_water_json = json_encode($frequency_water, JSON_THROW_ON_ERROR);
        } catch(\JsonException $e) {
            throw new \JsonException($e->getMessage());
        }

        $budget_items = [
            [
                'name' => 'Salary',
                'account' => $debit_id,
                'target_account' => null,
                'description' => 'My monthly salary from ACME Ltd',
                'amount' => '1866.00',
                'start_date' => '2020-01-01',
                'end_date' => null,
                'currency_id' => 'epMqeYqPkL',
                'category' => 'income',
                'frequency' => $monthly_frequency_json
            ],
            [
                'name' => 'Savings',
                'account' => $debit_id,
                'target_account' => $savings_id,
                'description' => 'Saving for our holiday',
                'amount' => '125.00',
                'start_date' => '2020-01-01',
                'end_date' => null,
                'currency_id' => 'epMqeYqPkL',
                'category' => 'savings',
                'frequency' => $monthly_frequency_json
            ],
            [
                'name' => 'Rent',
                'account' => $debit_id,
                'target_account' => null,
                'description' => 'Rent for our 3-Bed Semi in the Midlands',
                'amount' => '775.00',
                'start_date' => '2020-01-01',
                'end_date' => null,
                'currency_id' => 'epMqeYqPkL',
                'category' => 'fixed',
                'frequency' => $monthly_frequency_json
            ],
            [
                'name' => 'Council Tax',
                'account' => $debit_id,
                'target_account' => null,
                'description' => null,
                'amount' => '163.00',
                'start_date' => '2020-01-01',
                'end_date' => null,
                'currency_id' => 'epMqeYqPkL',
                'category' => 'fixed',
                'frequency' => $frequency_council_tax_json
            ],
            [
                'name' => 'Car insurance',
                'account' => $debit_id,
                'target_account' => null,
                'description' => null,
                'amount' => '525.00',
                'start_date' => '2020-01-01',
                'end_date' => null,
                'currency_id' => 'epMqeYqPkL',
                'category' => 'fixed',
                'frequency' => $frequency_car_insurance_json
            ],
            [
                'name' => 'Water',
                'account' => $debit_id,
                'target_account' => null,
                'description' => null,
                'amount' => '420.60',
                'start_date' => '2020-01-01',
                'end_date' => null,
                'currency_id' => 'epMqeYqPkL',
                'category' => 'fixed',
                'frequency' => $frequency_water_json
            ],
            [
                'name' => 'Netflix',
                'account' => $debit_id,
                'target_account' => null,
                'description' => null,
                'amount' => '15.99',
                'start_date' => '2020-01-01',
                'end_date' => null,
                'currency_id' => 'epMqeYqPkL',
                'category' => 'flexible',
                'frequency' => $monthly_frequency_json
            ],
            [
                'name' => 'Chess.com',
                'account' => $debit_id,
                'target_account' => null,
                'description' => null,
                'amount' => '5.99',
                'start_date' => '2020-01-01',
                'end_date' => null,
                'currency_id' => 'epMqeYqPkL',
                'category' => 'flexible',
                'frequency' => $monthly_frequency_json
            ],
            [
                'name' => 'Guitar lessons',
                'account' => $debit_id,
                'target_account' => null,
                'description' => null,
                'amount' => '100.00',
                'start_date' => '2020-01-01',
                'end_date' => null,
                'currency_id' => 'epMqeYqPkL',
                'category' => 'flexible',
                'frequency' => $monthly_frequency_json
            ],
            [
                'name' => 'Credit card payment',
                'account' => $debit_id,
                'target_account' => null,
                'description' => null,
                'amount' => '75.00',
                'start_date' => '2020-01-01',
                'end_date' => null,
                'currency_id' => 'epMqeYqPkL',
                'category' => 'fixed',
                'frequency' => $monthly_frequency_json
            ],
            [
                'name' => 'Gas & Electric',
                'account' => $debit_id,
                'target_account' => null,
                'description' => null,
                'amount' => '275.00',
                'start_date' => '2020-01-01',
                'end_date' => null,
                'currency_id' => 'epMqeYqPkL',
                'category' => 'fixed',
                'frequency' => $monthly_frequency_json
            ],
        ];

        foreach ($budget_items as $budget_item_payload)
        {
            $create_budget_item_response = $api->createBudgetItem(
                $this->resource_type_id,
                $this->resource_id,
                $budget_item_payload
            );

            if ($create_budget_item_response['status'] !== 201) {
                throw new \Exception('Unable to create the ' . $budget_item_payload['name'] .
                    ' demo budget item, returned error ' . $create_budget_item_response['content'] . ' return code ' .
                    $create_budget_item_response['status']);
            }
        }
    }

    private function setDemoFlag(Service $api): void
    {
        $resource_response = $api->getResource($this->resource_type_id, $this->resource_id);
        if ($resource_response['status'] !== 200) {
            throw new \Exception('Unable to fetch the resource from the API');
        }

        $data = $resource_response['content']['data'];
        $data['demo'] = true;
        try {
            $payload = json_encode($data, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw new \JsonException($e->getMessage());
        }

        $patch_resource_response = $api->patchResource(
            $this->resource_type_id,
            $this->resource_id,
            ['data' => $payload]
        );

        if ($patch_resource_response['status'] !== 204) {
            throw new \Exception('Unable to set the demo flag');
        }
    }
}