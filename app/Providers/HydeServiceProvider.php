<?php

namespace App\Providers;

use Hyde\Framework\Hyde;
use Illuminate\Support\ServiceProvider;

class HydeServiceProvider extends \Hyde\Framework\HydeServiceProvider
{
    public function register(): void
    {
        if (! $this->app->make('isSetup')) {
            return;
        }

        parent::register();
    }
}
