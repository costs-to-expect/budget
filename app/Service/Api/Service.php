<?php

declare(strict_types=1);

namespace App\Service\Api;

use Illuminate\Support\Facades\Config;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Service
{
    private Http $http;

    private string $item_type_id;

    private string $item_subtype_id;

    private array $requests = [];

    public function __construct(string $bearer = null)
    {
        $this->http = new Http($bearer);

        $this->item_type_id = Config::get('app.config.item_type_id');
        $this->item_subtype_id = Config::get('app.config.item_subtype_id');
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array', 'fields' => 'array'])]
    public function authenticationSignIn(string $email, string $password): array
    {
        $uri = Uri::signIn();

        return $this->http->post(
            $uri['uri'],
            [
                'email' => $email,
                'password' => $password,
                'device_name' => (app()->environment('local') ? 'budget:local:' : 'budget:'),
            ]
        );
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array', 'fields' => 'array'])]
    public function authenticationForgotPassword(array $payload): array
    {
        $uri = Uri::forgotPassword();

        return $this->http->post(
            $uri['uri'],
            [
                'email' => $payload['email'],
            ]
        );
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array'])]
    public function authenticationUser(): array
    {
        $uri = Uri::user();

        $response = $this->http->get($uri['uri']);

        if ($response['status'] === 200) {
            $this->requests[] = array_merge($uri, ['time' => $response['time']]);
        }

        return $response;
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array'])]
    public function budgetItem(string $resource_type_id, string $resource_id, string $item_id): array
    {
        $uri = Uri::item($resource_type_id, $resource_id, $item_id);

        $response = $this->http->get($uri['uri']);

        if ($response['status'] === 200) {
            $this->requests[] = array_merge($uri, ['time' => $response['time']]);
        }

        return $response;
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array'])]
    public function budgetItems(string $resource_type_id, string $resource_id, array $parameters = []): array
    {
        $uri = Uri::items($resource_type_id, $resource_id, $parameters);

        $response = $this->http->get($uri['uri']);

        if ($response['status'] === 200) {
            $this->requests[] = array_merge($uri, ['time' => $response['time']]);
        }

        return $response;
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array'])]
    public function currencies(): array
    {
        $uri = Uri::currencies();

        $response = $this->http->get($uri['uri']);

        if ($response['status'] === 200) {
            $this->requests[] = array_merge($uri, ['time' => $response['time']]);
        }

        return $response;
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array'])]
    public function currency(string $currency_id): array
    {
        $uri = Uri::currency($currency_id);

        $response = $this->http->get($uri['uri']);

        if ($response['status'] === 200) {
            $this->requests[] = array_merge($uri, ['time' => $response['time']]);
        }

        return $response;
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array', 'fields' => 'array'])]
    public function authenticationChangePassword(array $payload): array
    {
        $uri = Uri::changePassword();

        return $this->http->post(
            $uri['uri'],
            [
                'password' => $payload['password'],
                'password_confirmation' => $payload['password_confirmation'],
            ]
        );
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array', 'fields' => 'array'])]
    public function budgetItemCreate(string $resource_type_id, string $resource_id, array $payload): array
    {
        $uri = Uri::items($resource_type_id, $resource_id);

        return $this->http->post(
            $uri['uri'],
            $payload
        );
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array', 'fields' => 'array'])]
    public function authenticationCreatePassword(array $payload): array
    {
        $uri = Uri::createPassword($payload['token'], $payload['email']);

        return $this->http->post(
            $uri['uri'],
            [
                'password' => $payload['password'],
                'password_confirmation' => $payload['password_confirmation'],
            ]
        );
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array', 'fields' => 'array'])]
    public function authenticationCreateNewPassword(array $payload): array
    {
        $uri = Uri::createNewPassword($payload['encrypted_token'], $payload['email']);

        return $this->http->post(
            $uri['uri'],
            [
                'password' => $payload['password'],
                'password_confirmation' => $payload['password_confirmation'],
            ]
        );
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array'])]
    public function resourceCreate(string $resource_type_id): array
    {
        $uri = Uri::resources($resource_type_id);

        return $this->http->post(
            $uri['uri'],
            [
                'name' => 'Annual Budget',
                'description' => 'Your annual budget',
                'item_subtype_id' => $this->item_subtype_id,
            ]
        );
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array'])]
    public function resourceTypeCreate(): array
    {
        $uri = Uri::resourceTypes();

        return $this->http->post(
            $uri['uri'],
            [
                'name' => 'Budgeting',
                'description' => 'Free budgeting for all',
                'item_type_id' => $this->item_type_id,
            ]
        );
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'string'])]
    public function budgetItemDelete(
        string $resource_type_id,
        string $resource_id,
        string $item_id
    ): array {
        $uri = Uri::item($resource_type_id, $resource_id, $item_id);

        return $this->http->delete($uri['uri']);
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array'])]
    public function resource(string $resource_type_id, string $resource_id, array $parameters = []): array
    {
        $uri = Uri::resource($resource_type_id, $resource_id, $parameters);

        $response = $this->http->get($uri['uri']);

        if ($response['status'] === 200) {
            $this->requests[] = array_merge($uri, ['time' => $response['time']]);
        }

        return $response;
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array'])]
    public function resources(string $resource_type_id, array $parameters = []): array
    {
        $uri = Uri::resources($resource_type_id, $parameters);

        $response = $this->http->get($uri['uri']);

        if ($response['status'] === 200) {
            $this->requests[] = array_merge($uri, ['time' => $response['time']]);
        }

        return $response;
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array'])]
    public function resourceTypes(array $parameters = []): array
    {
        $uri = Uri::resourceTypes($parameters);

        $response = $this->http->get($uri['uri']);

        if ($response['status'] === 200) {
            $this->requests[] = array_merge($uri, ['time' => $response['time']]);
        }

        return $response;
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array', 'fields' => 'array'])]
    public function budgetItemUpdate(
        string $resource_type_id,
        string $resource_id,
        string $item_id,
        array $payload = []
    ): array {
        $uri = Uri::item($resource_type_id, $resource_id, $item_id);

        return $this->http->patch($uri['uri'], $payload);
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array', 'fields' => 'array'])]
    public function resourceUpdate(
        string $resource_type_id,
        string $resource_id,
        array $payload = []
    ): array {
        $uri = Uri::resource($resource_type_id, $resource_id);

        return $this->http->patch($uri['uri'], $payload);
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array', 'fields' => 'array'])]
    public function authenticationRegister(array $payload): array
    {
        $uri = Uri::register();

        return $this->http->post(
            $uri['uri'],
            [
                'name' => $payload['name'],
                'email' => $payload['email'],
                'registered_via' => 'budget',
            ]
        );
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array', 'fields' => 'array'])]
    public function accountRequestAppAccountDelete(
        string $resource_type_id,
        array $payload = []
    ): array {
        $uri = Uri::requestResourceTypeDelete($resource_type_id);

        return $this->http->post($uri['uri'], $payload);
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array', 'fields' => 'array'])]
    public function accountRequestDelete(
        array $payload = []
    ): array {
        $uri = Uri::requestDelete();

        return $this->http->post($uri['uri'], $payload);
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array', 'fields' => 'array'])]
    public function accountRequestAppReset(
        string $resource_type_id,
        string $resource_id,
        array $payload = []
    ): array {
        $uri = Uri::requestResourceDelete($resource_type_id, $resource_id);

        return $this->http->post($uri['uri'], $payload);
    }

    public function requests(): array
    {
        return $this->requests;
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array', 'fields' => 'array'])]
    public function authenticationUpdateProfile(array $payload): array
    {
        $uri = Uri::updateProfile();

        return $this->http->post(
            $uri['uri'],
            [
                'email' => $payload['email'],
                'name' => $payload['name'],
            ]
        );
    }

    #[ArrayShape(['status' => 'integer', 'content' => 'array'])]
    public function status(): array
    {
        $uri = Uri::status();

        $response = $this->http->get($uri['uri']);

        if ($response['status'] === 200) {
            $this->requests[] = array_merge($uri, ['time' => $response['time']]);
        }

        return $response;
    }
}
