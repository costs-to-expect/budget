<?php

declare(strict_types=1);

namespace App\Actions\Budget\Account;

use App\Actions\Action;
use App\Service\Api\Service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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
        string $account_id,
        array $input
    ): int {
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
                    'sometimes',
                ],
                'balance' => [
                    'required',
                    'string',
                    'regex:/^\d+\.\d{2}$/',
                    'max:16',
                ],
                'color' => [
                    'required',
                    'string',
                    'regex:/^#([A-Fa-f0-9]{6})$/',
                ],
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

        $data = $resource['content']['data'] ?? [];

        if (array_key_exists('accounts', $data) === false || array_key_exists($account_id, $data['accounts']) === false) {
            abort(404, 'Account cannot be found, please try again');
        }

        $data['accounts'][$account_id]['name'] = $input['name'];
        $data['accounts'][$account_id]['type'] = $input['type'];
        $data['accounts'][$account_id]['description'] = $input['description'];
        $data['accounts'][$account_id]['balance'] = $input['balance'];
        $data['accounts'][$account_id]['color'] = $input['color'];

        try {
            $data = json_encode($data, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
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
