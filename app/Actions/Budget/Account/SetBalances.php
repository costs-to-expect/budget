<?php
declare(strict_types=1);

namespace App\Actions\Budget\Account;

use App\Actions\Action;
use App\Api\Service;
use Illuminate\Support\Facades\Validator;
use JsonException;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class SetBalances extends Action
{
    public function __invoke(
        Service $api,
        string $resource_type_id,
        string $resource_id,
        array $input
    ): int
    {
        $resource = $api->resource($resource_type_id, $resource_id);
        if ($resource['status'] !== 200) {
            $this->message = 'Unable to fetch the resource for your Budget, please try again';
            return $resource['status'];
        }

        $rules = [];
        $messages = [];

        $data = $resource['content']['data'] ?? [];
        foreach ($data['accounts'] as $id => $account) {
            $rules[$id] = [
                'required',
                'string',
                'regex:/^\d+\.\d{2}$/',
                'max:16'
            ];
            $messages[$id . '.required'] = 'Please enter the balance for the account';
            $messages[$id . '.regex'] = 'The value should be in the format 0.00';
            $messages[$id . '.max'] = 'The balance value is too big';
        }

        Validator::make(
            $input,
            $rules,
            $messages
        )->validate();

        foreach ($data['accounts'] as $id => $account) {
            $data['accounts'][$id]['balance'] = $input[$id];
        }

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