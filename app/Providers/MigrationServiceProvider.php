<?php

namespace App\Providers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class MigrationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            DB::table('migrations')->count();
        } catch (\Illuminate\Database\QueryException $exception) {
            if ($exception->getCode() === 'HY000') {
                Artisan::call('migrate', ['--seed' => true]);
            } else {
                throw $exception;
            }
        }
    }
}
