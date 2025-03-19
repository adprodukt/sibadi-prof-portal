<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckStatusUser;

Route::middleware([CheckStatusUser::class])->group(function() {
    Route::get('/', [StaticPageController::class, 'index'])->name('page.index');
    Route::get('/login', [StaticPageController::class, 'login'])->name('page.login');
    
    Route::post('/login', [UserController::class, 'login'])->name('login');
    
    
    Route::middleware("auth")->group(function (){
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    
        Route::middleware(CheckAdmin::class)->group(function (){
            Route::get('/users', [UserController::class, 'index'])->name('users');
            Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    
            Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    
            Route::patch('/users/{id}/status', [UserController::class, 'setStatus'])->name('users.status');
            Route::get('/users/{id}/password', [UserController::class, 'editPassword'])->name('users.editPassword');
            Route::patch('/users/{id}/password', [UserController::class, 'updatePassword'])->name('users.updatePassword');

    
            Route::get('/users/{id}', [UserController::class, 'edit'])->name('users.edit');
            Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
        });
    
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    });

});


