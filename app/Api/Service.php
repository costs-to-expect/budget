<?php
declare(strict_types=1);

namespace App\Api;

use Illuminate\Support\Facades\Config;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Service
{
    private Http $http;

    private string $item_type_id;
    private string $item_subtype_id;

    public function __construct(string $bearer = null)
    {
        $this->http = new Http($bearer);

        $this->item_type_id = Config::get('app.config.item_type_id');
        $this->item_subtype_id = Config::get('app.config.item_subtype_id');
    }

    #[ArrayShape(['status' => "integer", 'content' => "array"])]
    public function authSignIn(string $email, string $password): array
    {
        $uri = Uri::authSignIn();

        return $this->http->post(
            $uri['uri'],
            [
                'email' => $email,
                'password' => $password,
                'device_name' => (app()->environment('local') ? 'budget:local:' : 'budget:')
            ]
        );
    }

    #[ArrayShape(['status' => "integer", 'content' => "array"])]
    public function getAuthUser(): array
    {
        $uri = Uri::authUser();

        return $this->http->get($uri['uri']);
    }

    #[ArrayShape(['status' => "integer", 'content' => "array"])]
    public function getCurrencies(): array
    {
        $uri = Uri::currencies();

        return $this->http->get($uri['uri']);
    }

    #[ArrayShape(['status' => "integer", 'content' => "array", 'fields' => "array"])]
    public function createPassword(array $payload): array
    {
        $uri = Uri::createPassword($payload['token'], $payload['email']);

        return $this->http->post(
            $uri['uri'],
            [
                'password' => $payload['password'],
                'password_confirmation' => $payload['password_confirmation']
            ]
        );
    }

    #[ArrayShape(['status' => "integer", 'content' => "array"])]
    public function createResource(string $resource_type_id): array
    {
        $uri = Uri::resources($resource_type_id);

        return $this->http->post(
            $uri['uri'],
            [
                'name' => 'Annual Budget',
                'description' => 'Your annual budget',
                'item_subtype_id' => $this->item_subtype_id
            ]
        );
    }

    #[ArrayShape(['status' => "integer", 'content' => "array"])]
    public function createResourceType(): array
    {
        $uri = Uri::resourceTypes();

        return $this->http->post(
            $uri['uri'],
            [
                'name' => 'Budgeting',
                'description' => 'Free budgeting for all',
                'item_type_id' => $this->item_type_id
            ]
        );
    }

    #[ArrayShape(['status' => "integer", 'content' => "array"])]
    public function getResource(string $resource_type_id, string $resource_id, array $parameters = []): array
    {
        $uri = Uri::resource($resource_type_id, $resource_id, $parameters);

        return $this->http->get($uri['uri'], true);
    }

    #[ArrayShape(['status' => "integer", 'content' => "array"])]
    public function getResources(string $resource_type_id, array $parameters = []): array
    {
        $uri = Uri::resources($resource_type_id, $parameters);

        return $this->http->get($uri['uri'], true);
    }

    #[ArrayShape(['status' => "integer", 'content' => "array"])]
    public function getResourceTypes(array $parameters = []): array
    {
        $uri = Uri::resourceTypes($parameters);

        return $this->http->get($uri['uri'], true);
    }

    #[ArrayShape(['status' => "integer", 'content' => "array", 'fields' => "array"])]
    public function patchResource(
        string $resource_type_id,
        string $resource_id,
        array $payload = []
    ): array
    {
        $uri = Uri::resource($resource_type_id, $resource_id);

        return $this->http->patch($uri['uri'], $payload);
    }

    #[ArrayShape(['status' => "integer", 'content' => "array", 'fields' => "array"])]
    public function register(array $payload): array
    {
        $uri = Uri::register();

        return $this->http->post(
            $uri['uri'],
            [
                'name' => $payload['name'],
                'email' => $payload['email']
            ]
        );
    }
}
