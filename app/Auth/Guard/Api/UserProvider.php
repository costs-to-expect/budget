<?php

namespace App\Auth\Guard\Api;

use App\Service\Api\Service;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class UserProvider implements \Illuminate\Contracts\Auth\UserProvider
{
    private array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function retrieveById($identifier): ?Authenticatable
    {
        $api = app(Service::class);

        $user_response = $api->authenticationUser();
        if ($user_response['status'] === 200) {
            $user = new User();
            $user->id = $user_response['content']['id'];
            $user->name = $user_response['content']['name'];
            $user->email = $user_response['content']['email'];

            return $user;
        }

        return null;
    }

    public function retrieveByToken($identifier, $token): ?Authenticatable
    {
        return $this->retrieveById($identifier);
    }

    public function updateRememberToken(Authenticatable $user, $token): void
    {
        // Not necessary
    }

    public function retrieveByCredentials(array $credentials): void
    {
        // Not necessary
    }

    public function validateCredentials(Authenticatable $user, array $credentials): void
    {
        // Not necessary
    }
}
