<?php

namespace App\Providers;

use App\Api\Service;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $api_status = [];

        if (app()->environment('local')) {
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
