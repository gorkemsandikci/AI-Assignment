<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SubscriptionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AdminController::class, 'showRegisterForm'])->name('admin.showRegisterForm');
Route::post('/register', [AdminController::class, 'register'])->name('auth.register');

Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.showLoginForm');
Route::post('/login', [AdminController::class, 'login'])->name('auth.login');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/subscriptions', [AdminController::class, 'subscriptions'])->name('subscription');
    Route::get('/users', [AdminController::class, 'users'])->name('user');
});

Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
