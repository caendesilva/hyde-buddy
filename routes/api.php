<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('filesystem/open', [\App\Http\Controllers\Api\SystemController::class, 'openFile'])->name('api.filesystem.open');

Route::get('filesystem/get/{path}', \App\Http\Controllers\Api\ProjectFileProxyController::class)->where('path', '.*');
