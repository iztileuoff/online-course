<?php

use App\Http\Controllers\API\AUTH\AuthAPIController;
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

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthAPIController::class, 'registration']);
    Route::post('/login', [AuthAPIController::class, 'authenticate']);
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::prefix('auth')->group(function () {
        Route::post('/logout', [AuthAPIController::class, 'logout'])->name('logout');
        Route::get('/check', [AuthAPIController::class, 'check'])->name('check');
    });
});
