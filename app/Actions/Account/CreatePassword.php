<?php
declare(strict_types=1);

namespace App\Actions\Account;

use App\Actions\Action;
use App\Api\Service;
use App\Models\PartialRegistration;
use App\Notifications\Registered;
use Illuminate\Support\Facades\Notification;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class CreatePassword extends Action
{
    public function __invoke(
        Service $api,
        array $input
    ): int
    {
        $post_response = $api->createPassword($input);

        if ($post_response['status'] === 204) {

            Notification::route('mail', $input['email'])
                ->notify(new Registered());

            PartialRegistration::query()
                ->where('token', '=', $input['token'])
                ->delete();

            return 204;
        }

        if ($post_response['status'] === 422) {
            $this->validation_errors = $post_response['fields'];
            $this->parameters = [
                'token' => $input['token'],
                'email' => $input['email'],
            ];

            return 422;
        }

        $this->message = $post_response['content'];
        $this->parameters = [
            'token' => $input['token'],
            'email' => $input['email'],
        ];

        return $post_response['status'];
    }
}