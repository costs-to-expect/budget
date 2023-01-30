<?php
declare(strict_types=1);

namespace App\Actions\Account;

use App\Actions\Action;
use App\Api\Service;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Notification;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class ForgotPassword extends Action
{
    public function __invoke(
        Service $api,
        array $input
    ): int
    {
        $post_response = $api->authenticationForgotPassword($input);

        if ($post_response['status'] === 201) {

            $this->parameters = $post_response['content']['uris']['create-new-password']['parameters'];

            Notification::route('mail', $input['email'])
                ->notify(new \App\Notifications\ForgotPassword($input['email'], $this->parameters['encrypted_token']));

            return 201;
        }

        if ($post_response['status'] === 422) {
            $this->validation_errors = $post_response['fields'];

            return 422;
        }

        $this->message = $post_response['content'];
        $this->parameters = [
            'email' => $input['email'],
        ];

        return $post_response['status'];
    }
}