<?php
declare(strict_types=1);

namespace App\Actions\Account;

use App\Actions\Action;
use App\Api\Service;
use App\Models\PartialRegistration;
use App\Notifications\CreatePassword;
use Illuminate\Support\Facades\Notification;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Register extends Action
{
    public function __invoke(
        Service $api,
        array $input
    ): int
    {
        $post_response = $api->authenticationRegister($input);

        if ($post_response['status'] === 201) {

            $this->parameters = $post_response['content']['uris']['create-password']['parameters'];

            $model = new PartialRegistration();
            $model->token = $this->parameters['token'];
            $model->email = $this->parameters['email'];
            $model->save();

            Notification::route('mail', $input['email'])
                ->notify((new CreatePassword($input['email'], $this->parameters['token']))->delay(now()->addMinute()));

            return 201;
        }

        if ($post_response['status'] === 422) {
            $this->validation_errors = $post_response['fields'];

            return 422;
        }

        $this->message = $post_response['content'];

        return $post_response['status'];
    }
}