<?php
declare(strict_types=1);

namespace App\Actions\Account;

use App\Actions\Action;
use Illuminate\Support\Facades\Auth;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class SignIn extends Action
{
    public function __invoke(
        array $input
    ): int
    {
        if (array_key_exists('email', $input) === false || $input['email'] === null) {
            $this->validation_errors['email']['errors'] = [
                'You need to provide your email address'
            ];
        }
        if (array_key_exists('password', $input) === false || $input['password'] === null) {
            $this->validation_errors['password']['errors'] = [
                'You need to provide your password'
            ];
        }

        if ($this->validation_errors !== []) {
            return 422;
        }


        if (Auth::attempt($input, array_key_exists('remember_me', $input))) {
            return 204;
        }

        $this->validation_errors = Auth::errors();

        return 422;
    }
}