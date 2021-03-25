<?php

use App\Http\Controllers\Dashboard\AdminAuthentication;
use App\Http\Controllers\Dashboard\AdminController;
use Illuminate\Support\Facades\Auth;


    Route::get('/login', [AdminAuthentication::class , 'login'])->name('dashboard.login');
    Route::post('/login', [AdminAuthentication::class , 'dologin'])->name('dashboard.login');

    Route::get('/forgot/password', [AdminAuthentication::class , 'forgot_password'])->name('dashboard.forgot_password');
    Route::post('/forgot/password', [AdminAuthentication::class , 'forgot_password_post'])->name('dashboard.forgot_password');

    Route::get('/reset/password/{token}',  [AdminAuthentication::class , 'reset_password'])->name('dashboard.reset_password');
    Route::post('/reset/password/{token}', [AdminAuthentication::class , 'reset_password_post'])->name('dashboard.reset_password');

    //set admin as default authentication for these routes
    //to use model Admin 
    Config::set('auth.defines','admin');
    //                        middleware:guard
    Route::group(['middleware' => 'admin:admin'] , function(){
    
        Route::get('/home', [AdminAuthentication::class , 'index'])->name('dashboard.home');
        Route::any('/logout', [AdminAuthentication::class,'logout'])->name('logout');

        Route::resource('admins', AdminController::class,[
            'names' => [
                'index'       => 'admins.index',
                'store'       => 'admins.store',
                'edit'        => 'admins.edit',
                'update'      => 'admins.update',
                'destroy'     => 'admins.destroy',
                'destroy_all' => 'admins.destroy_all',
                // etc...
            ]
        ]);

    });
