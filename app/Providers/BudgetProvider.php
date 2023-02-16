<?php

namespace App\Providers;

use App\Service\Budget\Service;
use App\Service\Budget\Settings;
use Illuminate\Support\ServiceProvider;

class BudgetProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Settings::class, function () {
            return new Settings();
        });

        $this->app->singleton(Service::class, function () {
            return new Service();
        });
    }
}
