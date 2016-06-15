<?php

namespace SmoDav\Flash\Providers;

use Illuminate\Support\ServiceProvider;
use SmoDav\Flash\Flash;

class FlashServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes(array(
            __DIR__.'/../../../resources/views' => base_path('resources/views/vendor/smodav/flash'),
            __DIR__.'/../../../resources/assets/css' => base_path('resources/assets/css/flash'),
            __DIR__.'/../../../resources/assets/js' => base_path('resources/assets/js/flash')
        ));
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('flash', function () {
            return new Flash();
        });
    }
}
