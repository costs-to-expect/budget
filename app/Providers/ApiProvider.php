<?php

namespace App\Providers;

use App\Service\Api\Service;
use Illuminate\Support\ServiceProvider;

class ApiProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Service::class, function () {
            return new Service(request()->cookie(config('app.config.cookie_bearer')));
        });
    }
}
