<?php
declare(strict_types=1);

namespace App\Api;

use JetBrains\PhpStorm\ArrayShape;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Uri
{
    private const VERSION = 'v3';

    #[ArrayShape(['uri' => "string", 'name' => "string"])]
    public static function authSignIn(): array
    {
        return [
            'uri' => '/' . self::VERSION . '/auth/login',
            'name' => 'Sign-in'
        ];
    }

    #[ArrayShape(['uri' => "string", 'name' => "string"])]
    public static function authUser(): array
    {
        return [
            'uri' => '/' . self::VERSION . '/auth/user',
            'name' => 'User Details'
        ];
    }

    #[ArrayShape(['uri' => "string", 'name' => "string"])]
    public static function changePassword(): array
    {
        $uri = '/' . self::VERSION . '/auth/update-password';

        return [
            'uri' => $uri,
            'name' => 'Change Password'
        ];
    }

    #[ArrayShape(['uri' => "string", 'name' => "string"])]
    public static function createPassword(string $token, string $email): array
    {
        $uri = '/' . self::VERSION . '/auth/create-password?token=' .
                urlencode($token) . '&email=' . urlencode($email);

        return [
            'uri' => $uri,
            'name' => 'Create Password'
        ];
    }

    #[ArrayShape(['uri' => "string", 'name' => "string"])]
    public static function currencies(): array
    {
        $uri = '/' . self::VERSION . '/currencies';

        return [
            'uri' => $uri,
            'name' => 'Currencies'
        ];
    }

    #[ArrayShape(['uri' => "string", 'name' => "string"])]
    public static function currency(string $currency_id): array
    {
        $uri = '/' . self::VERSION . '/currencies/' . $currency_id;

        return [
            'uri' => $uri,
            'name' => 'Currency'
        ];
    }

    #[ArrayShape(['uri' => "string", 'name' => "string"])]
    public static function forgotPassword(): array
    {
        $uri = '/' . self::VERSION . '/auth/forgot-password?send=false';

        return [
            'uri' => $uri,
            'name' => 'Forgot Password'
        ];
    }

    #[ArrayShape(['uri' => "string", 'name' => "string"])]
    public static function item(string $resource_type_id, string $resource_id, string $item_id): array
    {
        $uri = '/' . self::VERSION . '/resource-types/' . $resource_type_id . '/resources/' .
            $resource_id . '/items/' . $item_id;

        return [
            'uri' => $uri,
            'name' => 'Budget item'
        ];
    }

    #[ArrayShape(['uri' => "string", 'name' => "string"])]
    public static function items(string $resource_type_id, string $resource_id, array $parameters = []): array
    {
        $uri = '/' . self::VERSION . '/resource-types/' . $resource_type_id . '/resources/' .
                $resource_id . '/items';
        if (count($parameters) > 0) {
            $uri .= '?' . http_build_query($parameters);
        }

        return [
            'uri' => $uri,
            'name' => 'Budget items'
        ];
    }

    #[ArrayShape(['uri' => "string", 'name' => "string"])]
    public static function register(): array
    {
        $uri = '/' . self::VERSION . '/auth/register?send=false';

        return [
            'uri' => $uri,
            'name' => 'Register'
        ];
    }

    #[ArrayShape(['uri' => "string", 'name' => "string"])]
    public static function requestDelete(
        array $parameters = []
    ): array
    {
        $uri = '/' . self::VERSION . '/auth/user/request-delete';
        if (count($parameters) > 0) {
            $uri .= '?' . http_build_query($parameters);
        }

        return [
            'uri' => $uri,
            'name' => 'Request account deletion'
        ];
    }

    #[ArrayShape(['uri' => "string", 'name' => "string"])]
    public static function requestResourceDelete(
        string $resource_type_id,
        string $resource_id,
        array $parameters = []
    ): array
    {
        $uri = '/' . self::VERSION . '/auth/user/permitted-resource-types/' . $resource_type_id .
            '/resources/' . $resource_id . '/request-delete';
        if (count($parameters) > 0) {
            $uri .= '?' . http_build_query($parameters);
        }

        return [
            'uri' => $uri,
            'name' => 'Request reset'
        ];
    }

    #[ArrayShape(['uri' => "string", 'name' => "string"])]
    public static function requestResourceTypeDelete(
        string $resource_type_id,
        array $parameters = []
    ): array
    {
        $uri = '/' . self::VERSION . '/auth/user/permitted-resource-types/' .
            $resource_type_id . '/request-delete';
        if (count($parameters) > 0) {
            $uri .= '?' . http_build_query($parameters);
        }

        return [
            'uri' => $uri,
            'name' => 'Request Budget account deletion'
        ];
    }

    #[ArrayShape(['uri' => "string", 'name' => "string"])]
    public static function resource(
        string $resource_type_id,
        string $resource_id,
        array $parameters = []
    ): array
    {
        $uri = '/' . self::VERSION . '/resource-types/' . $resource_type_id .
            '/resources/' . $resource_id;
        if (count($parameters) > 0) {
            $uri .= '?' . http_build_query($parameters);
        }

        return [
            'uri' => $uri,
            'name' => 'Budget Resource'
        ];
    }

    #[ArrayShape(['uri' => "string", 'name' => "string"])]
    public static function resources(string $resource_type_id, array $parameters = []): array
    {
        $uri = '/' . self::VERSION . '/resource-types/' . $resource_type_id . '/resources';
        if (count($parameters) > 0) {
            $uri .= '?' . http_build_query($parameters);
        }

        return [
            'uri' => $uri,
            'name' => 'Budget Resources'
        ];
    }

    #[ArrayShape(['uri' => "string", 'name' => "string"])]
    public static function resourceTypes(array $parameters = []): array
    {
        $uri = '/' . self::VERSION . '/resource-types';
        if (count($parameters) > 0) {
            $uri .= '?' . http_build_query($parameters);
        }

        return [
            'uri' => $uri,
            'name' => 'Budget Resource Types'
        ];
    }

    #[ArrayShape(['uri' => "string", 'name' => "string"])]
    public static function updateProfile(): array
    {
        $uri = '/' . self::VERSION . '/auth/update-profile';

        return [
            'uri' => $uri,
            'name' => 'Update Profile'
        ];
    }
}
