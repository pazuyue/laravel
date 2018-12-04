<?php

namespace App\Providers;

use App\Tool\Library\Services\DemoOne;
use App\Tool\Library\Services\DemoTwo;
use App\Tool\Tool;
use Illuminate\Support\ServiceProvider;

class EnvatoCustomServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('Tool', function ($app) {
            return new Tool();
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Tool\Library\Services\Contracts\CustomServiceInterface', function ($app) {
            return new DemoTwo();
        });
    }
}
