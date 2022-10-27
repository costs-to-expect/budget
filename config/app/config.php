<?php
declare(strict_types=1);

return [
    'api_url' => env('API_URL', 'https://api.costs-to-expect.com'),
    'api_url_dev' => env('API_URL_DEV', 'https://api.costs-to-expect.com'),
    'dev' => env('APP_DEV', false),
    'cache' => env('APP_CACHE', false),
    'item_type_id' => env('ITEM_TYPE_ID'),
    'item_subtype_id' => env('ITEM_SUBTYPE_ID'),
    'cookie_user' => env('SESSION_NAME_USER'),
    'cookie_bearer' => env('SESSION_NAME_BEARER'),
    'version' => 'v0.21.0',
    'release_date' => '27th October 2022',
    'exception_notification_email' => env('EXCEPTION_NOTIFICATION_EMAIL'),
    'timezone' => 'UTC' // We can allow users to override this later
];
