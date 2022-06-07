<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Register the core services.
     *
     * @return void
     */
    public function register()
    {
        // Register the home path
        $this->app->bind('homePath', function () {
            return getenv('HOMEDRIVE') . getenv('HOMEPATH').'\.hyde-buddy';
        });

        // Register the database path
        $this->app->bind('databasePath', function () {
            return $this->app->make('homePath') . '/database';
        });

        // Bind the setup status
        $this->app->bind('isSetup', function () {
            return file_exists(app()->make('homePath') . '\\database\\.initialized');
        });

        // Bind the active project status
        $this->app->bind('hasActiveProject', function () {
            return file_exists(app()->make('homePath') . '\\database\\activeProject');
        });
    }

    /**
     * Bootstrap the core services.
     *
     * @return void
     */
    public function boot()
    {
        // Create the home path if it doesn't exist
        if (! file_exists($this->app->make('homePath'))) {
            mkdir($this->app->make('homePath'), recursive: true);
        }

        // Create the database path if it doesn't exist
        if (! file_exists($this->app->make('homePath') . '\\database')) {
            mkdir($this->app->make('homePath') . '\\database', recursive: true);
        }

        // Create the database file if it doesn't exist
        if (! file_exists($this->app->make('homePath') . '\\database\\database.sqlite')) {
            touch($this->app->make('homePath') . '\\database\\database.sqlite');
        }

        // Check that the home path exists
        if (realpath($this->app->make('homePath')) === false) {
            throw new \Exception('Something went wrong while booting the core service provider.');
        }
    }
}
