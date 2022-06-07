<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class SetupController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Check if the application is already setup
        if (SetupController::isSetup()) {
            return redirect()->route('dashboard');
        }

        return view('setup');
    }

    public function setup()
    {
        try {
            // Run the migrations
            Artisan::call('migrate', ['--seed' => true]);

            // Test the connection
            DB::table('migrations')->count();

            // Set the initialized state
            touch(app()->make('homePath') . '\\database\\.initialized');
        } catch (\Throwable $th) {
            // Rollback state
            if (file_exists(app()->make('homePath') . '\\database\\.initialized')) {
                unlink(app()->make('homePath') . '\\database\\.initialized');
            }

            throw $th;
        }

        return redirect()->route('welcome')->with('success', 'Setup complete!');
    }

    /**
     * @deprecated use the CoreServiceProvider binding instead
     */
    public static function isSetup()
    {
        return file_exists(app()->make('homePath') . '\\database\\.initialized');
    }
}
