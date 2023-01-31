<?php

namespace App\Providers;

use App\Service\Budget\Settings;
use Illuminate\Support\ServiceProvider;

class BudgetProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(Settings::class, function() {
            return new Settings();
        });
    }

    public function boot()
    {
        //
    }
}
