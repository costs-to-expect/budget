<?php

namespace App\Providers;

use App\Service\Api\Service;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $api_status = [];

        if (app()->runningInConsole() === false && app()->environment('local')) {
            $api = new Service();
            $status = $api->status();
            if ($status['status'] === 200) {
                $api_status = $status['content'];
            }
        }

        view()->composer('*', function ($view) use ($api_status) {
            $view->with('api_status', $api_status);
        });
    }
}
