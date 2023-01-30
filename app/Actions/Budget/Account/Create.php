<?php
declare(strict_types=1);

namespace App\Actions\Budget\Account;

use App\Actions\Action;
use App\Api\Service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
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
        // We need to validate the input because we are patching a resource
        // The API will only error if we don't send JSON which we won't, however, it is
        // possible the JSON could be invalid, as in missing data
        Validator::make(
            $input,
            [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],
                'type' => [
                    'required',
                    'string',
                    Rule::in(['expense', 'savings']),
                ],
                'description' => [
                    'sometimes'
                ],
                'currency_id' => [
                    'required',
                    'string'
                ],
                'balance' => [
                    'required',
                    'string',
                    'regex:/^\d+\.\d{2}$/',
                    'max:16'
                ],
                'color' => [
                    'required',
                    'string',
                    'regex:/^#([A-Fa-f0-9]{6})$/',
                ]
            ],
            [
                'balance.regex' => 'Costs should be in the format 0.00',
                'color.regex' => 'Color should be in the format #000000',
            ]
        )->validate();

        $resource = $api->resource($resource_type_id, $resource_id);
        if ($resource['status'] !== 200) {
            $this->message = 'Unable to fetch the resource for your Budget, please try again';
            return $resource['status'];
        }

        $resource_data = $resource['content']['data'] ?? [];

        $currencies = $api->currencies();
        if ($currencies['status'] !== 200) {
            $this->message = 'Unable to fetch the currencies, please try again';
            return $currencies['status'];
        }

        $currency = null;
        foreach ($currencies['content'] as $__currency) {
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
                    'color' => $input['color'],
                ]
            ];

            $payload = array_merge($resource_data, $payload);
        }

        if (array_key_exists('accounts', $resource_data) === true) {
            $payload = $resource_data;
            $id = Str::uuid()->toString();
            $payload['accounts'][$id] = [
                'id' => $id,
                'name' => $input['name'],
                'type' => $input['type'],
                'description' => $input['description'],
                'currency' => $currency,
                'balance' => $input['balance'],
                'color' => $input['color'],
            ];
        }

        try {
            $data = json_encode($payload, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            abort(500, $e->getMessage());
        }

        $patch_resource_response = $api->resourceUpdate(
            $resource_type_id,
            $resource_id,
            ['data' => $data]
        );

        if ($patch_resource_response['status'] === 204) {
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