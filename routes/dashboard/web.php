<?php

use App\Http\Controllers\Dashboard\AdminAuthenticationController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\SEttingController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AdminAuthenticationController::class , 'login'])->name('dashboard.login');
    Route::post('/login', [AdminAuthenticationController::class , 'dologin'])->name('dashboard.login');

    Route::get('/forgot/password', [AdminAuthenticationController::class , 'forgot_password'])->name('dashboard.forgot_password');
    Route::post('/forgot/password', [AdminAuthenticationController::class , 'forgot_password_post'])->name('dashboard.forgot_password');

    Route::get('/reset/password/{token}',  [AdminAuthenticationController::class , 'reset_password'])->name('dashboard.reset_password');
    Route::post('/reset/password/{token}', [AdminAuthenticationController::class , 'reset_password_post'])->name('dashboard.reset_password');

    //set admin as default authentication for these routes
    //to use model Admin 
    Config::set('auth.defines','admin');
    //                        middleware:guard
    Route::group(['middleware' => 'admin:admin'] , function(){
    
        Route::get('/home', [AdminAuthenticationController::class , 'index'])->name('dashboard.home');
        Route::any('/logout', [AdminAuthenticationController::class,'logout'])->name('logout');

        Route::resource('admins', AdminController::class,[
            'names' => [
                'index'       => 'admins.index',
                'store'       => 'admins.store',
                'edit'        => 'admins.edit',
                'update'      => 'admins.update',
                'destroy'     => 'admins.destroy',
            ]
        ]);

        Route::delete('/admins/delete/all',[AdminController::class , 'multi_delete'])->name('admins.destroy_all');

        //******************************************* Settings Routes **********************************************************//

        Route::resource('settings', SettingController::class,[
            'names' => [
                'edit'        => 'admins.edit',
                'update'      => 'admins.update',
            ]
        ]);



    });
