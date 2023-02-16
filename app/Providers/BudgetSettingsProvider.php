<?php

namespace App\Providers;

use App\Service\Budget\Settings;
use Illuminate\Support\ServiceProvider;

class BudgetSettingsProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Settings::class, function () {
            return new Settings();
        });
    }
}
