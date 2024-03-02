<?php

use App\Http\Controllers\Admin\Setting\GeneralController;
use App\Http\Controllers\User\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::prefix('admin')->middleware('isAdmin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('settings')->group(function(){
        Route::get('/general',[GeneralController::class, 'index'])->name('admin.settings.general');
        Route::post('/general/update',[GeneralController::class, 'update'])->name('admin.settings.general.update');
        Route::get('/general/logo/delete',[GeneralController::class, 'logo_delete'])->name('admin.settings.general.logo');
        Route::get('/general/favicon/delete',[GeneralController::class, 'favicon_delete'])->name('admin.settings.general.favicon');
    });
});

