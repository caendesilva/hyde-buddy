<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DebugController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SetupController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/setup', SetupController::class)->name('setup');
Route::post('/setup', [SetupController::class, 'setup']);

Route::resource('projects', ProjectController::class);

Route::get('/debug', DebugController::class);
