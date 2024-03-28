<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Setting\GeneralController;
use App\Http\Controllers\Admin\Setting\SmtpController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VendorController;
use Illuminate\Support\Facades\Route;


Route::get('admin/login', [LoginController::class, 'index'])->name('admin.login.get');
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->middleware('isAdmin')->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::name('admin.')->group(function () {

        // Vendor Routes
        Route::resource('vendors', VendorController::class);
        Route::get('change_status',[VendorController::class, 'change_status'])->name('vendors.change_status');

        // Customer Routes
        Route::resource('customers', UserController::class);

        //Category Route
        Route::resource('categories', CategoryController::class);

        //Sub Category Route
        Route::resource('sub_categories', SubCategoryController::class);


    });


    Route::prefix('settings')->group(function(){
        // General Setting Routes
        Route::get('/general',[GeneralController::class, 'index'])->name('admin.settings.general');
        Route::post('/general/update',[GeneralController::class, 'update'])->name('admin.settings.general.update');
        Route::get('/general/logo/delete',[GeneralController::class, 'logo_delete'])->name('admin.settings.general.logo');
        Route::get('/general/favicon/delete',[GeneralController::class, 'favicon_delete'])->name('admin.settings.general.favicon');

        // General SMTP Routes
        Route::get('/smtp',[SmtpController::class, 'index'])->name('admin.settings.smtp');
        Route::post('/smtp/update',[SmtpController::class, 'update'])->name('admin.settings.smtp.update');

    });
});

