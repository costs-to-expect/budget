<?php
declare(strict_types=1);

namespace App\Actions\Account;

use App\Actions\Action;
use App\Api\Service;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class CreateNewPassword extends Action
{
    public function __invoke(
        Service $api,
        array $input
    ): int
    {
        $post_response = $api->createNewPassword($input);

        if ($post_response['status'] === 204) {
            return 204;
        }

        if ($post_response['status'] === 422) {
            $this->validation_errors = $post_response['fields'];
            $this->parameters = [
                'encrypted_token' => $input['encrypted_token'],
                'email' => $input['email'],
            ];

            return 422;
        }

        $this->message = $post_response['content'];
        $this->parameters = [
            'encrypted_token' => $input['encrypted_token'],
            'email' => $input['email'],
        ];

        return $post_response['status'];
    }
}