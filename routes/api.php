<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['prefix' => '/auth'], function () {
    Route::post('', [AuthController::class, 'login']);
});
Route::group(['prefix' => '/subscription'], function () {
    Route::post('/', [SubscriptionController::class, 'store']);
});
Route::group(['prefix' => '/chat'], function () {
    Route::get('/list', [ChatController::class, 'list']);

    Route::middleware('throttle:messages')->group(function () {
        Route::post('/', [ChatController::class, 'send']);
    });
});
