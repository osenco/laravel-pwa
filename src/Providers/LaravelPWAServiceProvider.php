<?php

namespace LaravelPWA\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use LaravelPWA\Console\Commands\DeployManifest;
use LaravelPWA\Services\MetaService;

class LaravelPWAServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerConfig();
        $this->registerIcons();
        $this->registerViews();
        $this->registerServiceworker();
        $this->registerDirective();
        $this->registerCommands();
        $this->registerRoutes();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__ . '/../../config/laravelpwa.php' => config_path('laravelpwa.php'),
        ], 'config');

        $this->mergeConfigFrom(
            __DIR__ . '/../../config/laravelpwa.php',
            'laravelpwa'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $sourcePath = __DIR__ . '/../../resources/views';

        $this->loadViewsFrom($sourcePath, 'laravelpwa');

        $this->publishes([
            $sourcePath => resource_path('views/vendor/laravelpwa'),
        ], 'pwa-views');
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerIcons()
    {
        $this->publishes([
            __DIR__ . '/../assets/images/icons' => public_path('images/icons'),
        ], 'pwa-icons');
    }

    /**
     * Register serviceworker.js.
     *
     * @return void
     */
    protected function registerServiceworker()
    {
        $this->publishes([
            __DIR__ . '/../assets/js' => public_path(),
        ], 'pwa-serviceworker');
    }

    /**
     * Register directive.
     *
     * @return void
     */
    public function registerDirective()
    {
        Blade::directive('laravelPWA', function () {
            return (new MetaService)->render();
        });
    }


    /**
     * Register the available commands
     *
     * @return void
     */
    public function registerCommands()
    {
        $this->commands([
            DeployManifest::class,
        ]);

    }
}