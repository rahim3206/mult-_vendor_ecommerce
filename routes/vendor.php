<?php

use App\Http\Controllers\Vendor\Auth\LoginController;
use App\Http\Controllers\Vendor\Auth\RegisterController;
use App\Http\Controllers\Vendor\HomeController;
use Illuminate\Support\Facades\Auth;
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
Route::get('vendor/login', [LoginController::class, 'index'])->name('vendor.login.get');
Route::get('vendor/register', [RegisterController::class, 'index'])->name('vendor.register.get');
Route::post('vendor/login', [LoginController::class, 'login'])->name('vendor.login');
Route::post('vendor/register', [RegisterController::class, 'register'])->name('vendor.register');
Route::post('vendor/logout', [LoginController::class, 'logout'])->name('vendor.logout');

Route::prefix('vendor')->middleware('isVendor')->group(function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('vendor.index');

    Route::name('vendor.')->group(function () {
        
    });
});

