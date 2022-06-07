<?php

namespace App\Providers;

use Hyde\Framework\Hyde;
use Illuminate\Support\ServiceProvider;

class HydeServiceProvider extends \Hyde\Framework\HydeServiceProvider
{
    public function register(): void
    {
        if (! $this->app->make('isSetup') || ! $this->app->make('hasActiveProject')) {
            return;
        }

        Hyde::setBasePath(file_get_contents($this->app->make('homePath') . '\\database\\activeProject'));

        parent::register();
    }
}
