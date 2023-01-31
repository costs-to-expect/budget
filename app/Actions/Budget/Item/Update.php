<?php
declare(strict_types=1);

namespace App\Actions\Budget\Item;

use App\Actions\Action;
use App\Actions\Helper;
use App\Service\Api\Service;
use App\Service\Budget\Settings;
use DateTimeImmutable;
use JsonException;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Update extends Action
{
    public function __invoke(
        Service $api,
        string $resource_type_id,
        string $resource_id,
        string $item_id,
        array $input
    ): int
    {
        $item_response = $api->budgetItem($resource_type_id, $resource_id, $item_id);
        if ($item_response['status'] !== 200) {
            $this->message = $item_response['content'];
            return $item_response['status'];
        }

        $item = $item_response['content'];

        $payload = [];

        // Check simple fields
        foreach (['name', 'account', 'description', 'start_date', 'end_date', 'amount', 'category'] as $field) {
            if ($item[$field] !== $input[$field]) {
                $payload[$field] = $input[$field];
            }
        }

        if ($input['currency_id'] !== $item['currency']['id']) {
            $payload['currency_id'] = $input['currency_id'];
        }

        // Check target account
        if ($input['category'] === 'savings') {
            if ($input['target_account'] !== $item['target_account']) {
                $payload['target_account'] = $input['target_account'];
            }
        } elseif ($item['target_account'] !== null) {
            $payload['target_account'] = null;
        }

        // Check the frequency
        $frequency = Helper::createFrequencyArray($input);

        if ($frequency['type'] === 'one-off') {
            $start_date = new DateTimeImmutable($input['start_date'], app(Settings::class)->dateTimeZone());
            $end_date = $start_date->modify('first day of next month')->setTime(7, 1);
            $payload['end_date'] = $end_date->format('Y-m-d');
        }

        ksort($item['frequency']);
        if ($frequency !== $item['frequency']) {
            $payload['frequency'] = $frequency;
        }

        if (count($payload) === 0) {
            $this->message = 'No changes to save';
            return 204;
        }

        if (array_key_exists('frequency', $payload)) {
            try {
                $payload['frequency'] = json_encode($payload['frequency'], JSON_THROW_ON_ERROR);
            } catch (JsonException $e) {
                $this->validation_errors['frequency_option']['errors'] = [
                    'The frequency settings could not be encoded to JSON, please try again'
                ];
                return 422;
            }
        }

        $patch_budget_item_response = $api->budgetItemUpdate(
            $resource_type_id,
            $resource_id,
            $item_id,
            $payload
        );

        if ($patch_budget_item_response['status'] === 204) {
            return 204;
        }

        if ($patch_budget_item_response['status'] === 422) {
            $this->message = $patch_budget_item_response['content'];
            $this->validation_errors = $patch_budget_item_response['fields'];
            return 422;
        }

        $this->message = $patch_budget_item_response['content'];

        return $patch_budget_item_response['status'];
    }
}
