<?php
declare(strict_types=1);

namespace App\Actions\Budget\Account;

use App\Actions\Action;
use App\Api\Service;
use Illuminate\Support\Str;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Create extends Action
{
    public function __invoke(
        Service $api,
        string $resource_type_id,
        string $resource_id,
        array $input
    ): int
    {
        $resource = $api->getResource($resource_type_id, $resource_id);
        if ($resource['status'] !== 200) {
            $this->message = 'Unable to fetch the resource for your Budget, please try again';
            return $resource['status'];
        }

        try {
            $resource_data = json_decode($resource['content']['data'], true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            $this->message = $e->getMessage();
            return 500;
        }

        $currencies = $api->getCurrencies();
        if ($currencies['status'] !== 200) {
            $this->message = 'Unable to fetch the currencies, please try again';
            return $currencies['status'];
        }

        $currency = null;
        foreach ($currencies as $__currency) {
            if (array_key_exists('currency_id', $input) && $input['currency_id'] === $__currency['id']) {
                $currency = $__currency;
                break;
            }
        }

        if ($currency === null) {
            $this->message = 'Unable to find the selected currency, please try again';
            return 500;
        }

        $payload = [];

        if (array_key_exists('accounts', $resource_data) === false) {
            $id = Str::uuid()->toString();
            $payload['accounts'] = [
                $id => [
                    'id' => $id,
                    'name' => $input['name'],
                    'type' => $input['type'],
                    'description' => $input['description'],
                    'currency' => $currency,
                    'balance' => $input['balance'],
                ]
            ];

            $payload = array_merge($resource_data, $payload);
        }

        if (array_key_exists('accounts', $resource_data) === true) {
            $payload = $resource_data;
            $payload['accounts'][] = [
                'id' => $id,
                'name' => $input['name'],
                'type' => $input['type'],
                'description' => $input['description'],
                'currency' => [
                    $currencies[$input['currency_id']]
                ],
                'balance' => $input['balance'],
            ];
        }

        $patch_resource_response = $api->patchResource(
            $resource_type_id,
            $resource_id,
            $payload
        );

        if ($patch_resource_response['status'] === 201) {
            return $patch_resource_response['status'];
        }

        $this->message = $patch_resource_response['content'];

        if ($patch_resource_response['status'] === 422) {
            $this->validation_errors = $patch_resource_response['fields'];
            return $patch_resource_response['status'];
        }

        return $patch_resource_response['status'];
    }
}