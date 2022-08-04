<?php
declare(strict_types=1);

namespace App\Api;

use JetBrains\PhpStorm\ArrayShape;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
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
            'name' => 'User'
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
    public static function register(): array
    {
        $uri = '/' . self::VERSION . '/auth/register?send=false';

        return [
            'uri' => $uri,
            'name' => 'Register'
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
            'name' => 'Resources'
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
            'name' => 'Resource types'
        ];
    }
}