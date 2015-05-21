<?php namespace Venturecraft\Revisionable;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;


/**
 * RevisionsableServiceProvider
 *
 * Instantitates the revisionable package
 *
 * (c) Venture Craft <http://www.venturecraft.com.au>
 */
class RevisionableServiceProvider extends LaravelServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {

        $this->handleConfigs();
        $this->handleMigrations();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        // Bind any implementations.

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {

        return [];
    }

    private function handleConfigs() {

        $configPath = __DIR__ . '/../../config/config.php';

        $this->publishes([$configPath => config_path('revisionable.php')]);

        $this->mergeConfigFrom($configPath, 'revisionable');
    }

    private function handleMigrations() {
        date('Y_m_d_His');
        $this->publishes([
            __DIR__ . '/../../migrations' => base_path('database/migrations')
        ], 'migrations');
    }

}