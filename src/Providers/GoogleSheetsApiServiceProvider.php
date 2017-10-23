<?php

namespace Macki\Providers;

use Illuminate\Support\ServiceProvider;

use Macki\GoogleSheetsApiClient;
use Macki\Factory\GoogleSheetApiFactory;

class GoogleSheetsApiServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/google-sheet-api.php' => config_path('google-sheet-api.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/google-sheet-api.php', 'google-sheet-api'
        );

        $this->app->singleton(GoogleSheetsApiClient::class, function ($app) {
            return GoogleSheetApiFactory::createForConfig($app['config']['google-sheet-api.php']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [GoogleSheetsApiClient::class];
    }
}
