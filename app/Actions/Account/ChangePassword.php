<?php
declare(strict_types=1);

namespace App\Actions\Account;

use App\Actions\Action;
use App\Service\Api\Service;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class ChangePassword extends Action
{
    public function __invoke(
        Service $api,
        array $input
    ): int
    {
        $post_response = $api->authenticationChangePassword($input);

        if ($post_response['status'] === 204) {
            return $post_response['status'];
        }

        $this->message = $post_response['content'];

        if ($post_response['status'] === 422) {
            $this->validation_errors = $post_response['fields'];
            return $post_response['status'];
        }

        return $post_response['status'];
    }
}