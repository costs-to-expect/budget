<?php

namespace App\Jobs;

use App\Api\Service;
use App\Models\AdjustedBudgetItem;
use App\Models\PaidBudgetItem;
use App\Notifications\Exception;
use App\Service\Budget\Settings;
use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use JsonException;
use Throwable;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class LoadDemo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $resource_type_id;
    private string $resource_id;
    private string $bearer;
    private string $currency_id;
    private array $currency;
    private array $period;

    private Settings $settings;

    public function __construct(
        string $resource_type_id,
        string $resource_id,
        string $bearer,
        string $currency_id
    )
    {
        $this->settings = app(Settings::class);

        $this->resource_type_id = $resource_type_id;
        $this->resource_id = $resource_id;
        $this->bearer = $bearer;
        $this->currency_id = $currency_id;
        $this->period = $this->calculatePeriod();
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
        Notification::route('mail', Config::get('app.config.exception_notification_email'))
            ->notify(new Exception(
                    $exception->getCode(),
                    $exception->getMessage(),
                    $exception->getFile(),
                    $exception->getLine(),
                    $exception->getTraceAsString()
                )
            );
    }

    private function confirmNoBudgetSetup(Service $api): void
    {
        $resource = $api->resource($this->resource_type_id, $this->resource_id);
        if ($resource['status'] !== 200) {
            $this->fail(new \Exception('Unable to fetch the resource, no Budget account'));
        }

        $accounts = [];
        $data = $resource['content']['data'];
        if ((is_array($data) && array_key_exists('accounts', $data) === true)) {
            $accounts = $data['accounts'];
        }

        $budget_items_response = $api->budgetItems(
            $this->resource_type_id,
            $this->resource_id,
            [
                'limit' => 50,
                'sort' => 'amount:desc|created:asc'
            ]
        );
        if ($budget_items_response['status'] !== 200) {
            $this->fail(new \Exception('Unable to fetch the budget item collection, guessing no Budget account'));
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
            $this->fail(new \Exception('User has some form of Budget setup, aborting'));
        }
    }

    private function createAccounts(Service $api): array
    {
        // Fetch the requested currency
        $currency_response = $api->currency($this->currency_id);
        if ($currency_response['status'] !== 200) {
            $this->fail(new \Exception('Unable to fetch the currency, cannot create accounts'));
        }

        $this->currency = $currency_response['content'];

        $debit = [
            'currency' => [
                'id' => $this->currency['id'],
                'code' => $this->currency['code'],
                'name' => $this->currency['name']
            ],
            'type' => 'expense',
            'id' => Str::uuid()->toString(),
            'name' => 'Checking',
            'description' => null,
            'balance' => '2848.65',
            'color' => "#" . dechex(random_int(0, 16777215))
        ];
        $savings = [
            'currency' => [
                'id' => $this->currency['id'],
                'code' => $this->currency['code'],
                'name' => $this->currency['name']
            ],
            'type' => 'savings',
            'id' => Str::uuid()->toString(),
            'name' => 'Savings',
            'description' => null,
            'balance' => '219.54',
            'color' => "#" . dechex(random_int(0, 16777215))
        ];

        $payload['accounts'] = [
            $debit['id'] => $debit,
            $savings['id'] => $savings
        ];

        try {
            $data = json_encode($payload, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            $this->fail($e);
        }

        $patch_resource_response = $api->resourceUpdate(
            $this->resource_type_id,
            $this->resource_id,
            ['data' => $data]
        );

        if ($patch_resource_response['status'] !== 204) {
            $this->fail(new \Exception('Unable to patch the resource and create the demo accounts'));
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
        } catch(JsonException $e) {
            $this->fail($e);
        }

        $frequency_council_tax = [
            'type' => 'monthly',
            'day' => null,
            'exclusions' => [2, 3],
        ];
        try {
            $frequency_council_tax_json = json_encode($frequency_council_tax, JSON_THROW_ON_ERROR);
        } catch(JsonException $e) {
            $this->fail($e);
        }

        $frequency_car_insurance = [
            'type' => 'annually',
            'day' => null,
            'month' => (int) $this->period['month'],
        ];
        try {
            $frequency_car_insurance_json = json_encode($frequency_car_insurance, JSON_THROW_ON_ERROR);
        } catch(JsonException $e) {
            $this->fail($e);
        }

        $frequency_water = [
            'type' => 'annually',
            'day' => null,
            'month' => 10
        ];
        try {
            $frequency_water_json = json_encode($frequency_water, JSON_THROW_ON_ERROR);
        } catch(JsonException $e) {
            $this->fail($e);
        }

        $frequency_one_off  = [
            'type' => 'one-off',
            'day' => null,
            'month' => (int) $this->period['month'],
            'year' => (int) $this->period['year']
        ];
        try {
            $frequency_one_off_json = json_encode($frequency_one_off, JSON_THROW_ON_ERROR);
        } catch(JsonException $e) {
            $this->fail($e);
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
                'currency_id' => $this->currency['id'],
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
                'currency_id' => $this->currency['id'],
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
                'currency_id' => $this->currency['id'],
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
                'currency_id' => $this->currency['id'],
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
                'currency_id' => $this->currency['id'],
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
                'currency_id' => $this->currency['id'],
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
                'currency_id' => $this->currency['id'],
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
                'currency_id' => $this->currency['id'],
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
                'currency_id' => $this->currency['id'],
                'category' => 'flexible',
                'frequency' => $monthly_frequency_json
            ],
            [
                'name' => 'Piano lessons',
                'account' => $debit_id,
                'target_account' => null,
                'description' => null,
                'amount' => '100.00',
                'start_date' => '2020-01-01',
                'disabled' => 1,
                'end_date' => null,
                'currency_id' => $this->currency['id'],
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
                'currency_id' => $this->currency['id'],
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
                'currency_id' => $this->currency['id'],
                'category' => 'fixed',
                'frequency' => $monthly_frequency_json
            ],
            [
                'name' => 'Holiday deposit',
                'account' => $debit_id,
                'target_account' => null,
                'description' => null,
                'amount' => '175.00',
                'start_date' => $this->period['year'] . '-' . $this->period['month'] . '-15',
                'end_date' => $this->period['year_next'] . '-' . $this->period['month_next'] . '-01',
                'currency_id' => $this->currency['id'],
                'category' => 'flexible',
                'frequency' => $frequency_one_off_json
            ],
        ];

        foreach ($budget_items as $budget_item_payload)
        {
            $create_budget_item_response = $api->budgetItemCreate(
                $this->resource_type_id,
                $this->resource_id,
                $budget_item_payload
            );

            if ($create_budget_item_response['status'] !== 201) {

                $error_suffix = '';
                if ($create_budget_item_response['status'] === 422) {
                    $error_suffix = ' - ' . json_encode($create_budget_item_response['fields']);
                }

                $this->fail(new \Exception('Unable to create the ' . $budget_item_payload['name'] .
                    ' demo budget item, returned error ' . $create_budget_item_response['content'] . ' return code ' .
                    $create_budget_item_response['status'] . $error_suffix));
            }

            $budget_item = $create_budget_item_response['content'];
            if ($budget_item['name'] === 'Credit card payment') {
                $paid = new PaidBudgetItem();
                $paid->resource_id = $this->resource_id;
                $paid->budget_item_id = $budget_item['id'];
                $paid->month = $this->period['month'];
                $paid->year = $this->period['year'];
                $paid->save();
            }

            if ($budget_item['name'] === 'Guitar lessons') {
                $adjusted = new AdjustedBudgetItem();
                $adjusted->resource_id = $this->resource_id;
                $adjusted->budget_item_id = $budget_item['id'];
                $adjusted->month = $this->period['month'];
                $adjusted->year = $this->period['year'];
                $adjusted->amount = 125.00;
                $adjusted->save();
            }
        }
    }

    private function setDemoFlag(Service $api): void
    {
        $resource_response = $api->resource($this->resource_type_id, $this->resource_id);
        if ($resource_response['status'] !== 200) {
            $this->fail(new \Exception('Unable to fetch the resource from the API'));
        }

        $data = $resource_response['content']['data'];
        $data['demo'] = true;
        try {
            $payload = json_encode($data, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            $this->fail($e);
        }

        $patch_resource_response = $api->resourceUpdate(
            $this->resource_type_id,
            $this->resource_id,
            ['data' => $payload]
        );

        if ($patch_resource_response['status'] !== 204) {
            $this->fail(new \Exception('Unable to set the demo flag'));
        }
    }

    private function calculatePeriod(): array
    {
        $this_month = (new DateTime('first day of this month', $this->settings->dateTimeZone()))->setTime(7, 1);

        $year = $this_month->format('Y');
        $month = $this_month->format('m');

        $this_month->modify('first day of next month');

        return [
            'year' => $year,
            'month' => $month,
            'year_next' => $this_month->format('Y'),
            'month_next' => $this_month->format('m'),
        ];
    }
}
