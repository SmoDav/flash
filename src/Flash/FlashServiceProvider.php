<?php

namespace SmoDav\Flash;

use Illuminate\Support\ServiceProvider;

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
            __DIR__.'/../../resources/views' => base_path('resources/views/vendor/smodav/flash'),
            __DIR__.'/../../resources/assets/css' => base_path('resources/assets/css/flash'),
            __DIR__.'/../../resources/assets/js' => base_path('resources/assets/js/flash')
        ));
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('SmoDav\Flash\SessionStore', 'SmoDav\Flash\LaravelSessionStore');
        
        $this->app->singleton('flash', function () {
            return $this->app->make('SmoDav\Flash\Notifier');
        });
    }
}
