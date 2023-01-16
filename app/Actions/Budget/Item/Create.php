<?php
declare(strict_types=1);

namespace App\Actions\Budget\Item;

use App\Actions\Action;
use App\Actions\Helper;
use App\Api\Service;
use DateTimeZone;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Create extends Action
{
    public function __invoke(
        Service $api,
        DateTimeZone $timezone,
        string $resource_type_id,
        string $resource_id,
        array $input
    ): int
    {
        if (array_key_exists('frequency_option', $input) === true) {
            if (in_array($input['frequency_option'], ['monthly', 'annually', 'one-off']) === false) {
                $this->validation_errors['frequency_option']['errors'] = [
                    'The frequency need to be set to monthly, annually or one-off'
                ];
            }

            if (
                $input['frequency_option'] === 'annually' &&
                $input['annually_month'] === null) {
                $this->validation_errors['annually_month']['errors'] = [
                    'You need to set the month the expense occurs'
                ];
            }
        } else {
            $this->validation_errors['frequency_option']['errors'] = [
                'The frequency is required.'
            ];
        }

        if (array_key_exists('exclusion', $input) === true) {
            foreach ($input['exclusion'] as $__month) {
                if ((int) $__month < 1 || (int) $__month > 12) {
                    $this->validation_errors['exclusion']['errors'] = [
                        'Exclusions can only be set for real months, values should be between 1 and 12'
                    ];
                }
            }
        }

        if (count($this->validation_errors) > 0) {
            return 422;
        }

        $frequency = Helper::createFrequencyArray($input, $timezone);

        if ($frequency['type'] === 'one-off') {
            $start_date = new \DateTimeImmutable($input['start_date'], $timezone);
            $end_date = $start_date->modify('first day of next month')->setTime(7, 1);
            $input['end_date'] = $end_date->format('Y-m-d');
        }

        try {
            $frequency_json = json_encode($frequency, JSON_THROW_ON_ERROR);
        } catch(\JsonException $e) {
            $this->validation_errors['frequency_option']['errors'] = [
                'The frequency settings could not be encoded to JSON, please try again'
            ];
            return 422;
        }

        $payload = [
            'name' => $input['name'],
            'account' => $input['account'],
            'target_account' => ($input['category'] === 'savings') ? $input['target_account'] ?? null : null,
            'description' => $input['description'] ?? null,
            'amount' => $input['amount'],
            'start_date' => $input['start_date'],
            'end_date' => $input['end_date'] ?? null,
            'currency_id' => $input['currency_id'],
            'category' => $input['category'],
            'frequency' => $frequency_json
        ];

        $create_budget_item_response = $api->createBudgetItem(
            $resource_type_id,
            $resource_id,
            $payload
        );

        if ($create_budget_item_response['status'] === 201) {
            return 201;
        }

        if ($create_budget_item_response['status'] === 422) {
            $this->message = $create_budget_item_response['content'];
            $this->validation_errors = $create_budget_item_response['fields'];
            return 422;
        }

        return $create_budget_item_response['status'];
    }
}
