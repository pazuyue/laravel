<?php

namespace App\Providers;

use App\Tool\Tool;
use Illuminate\Support\ServiceProvider;

class ToolServiceProvider extends ServiceProvider
{

    //protected $defer = true;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Tool',function(){
            return new Tool();
        });
    }
}
