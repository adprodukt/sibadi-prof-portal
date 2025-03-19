<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAdmin;

Route::get('/', [StaticPageController::class, 'index'])->name('page.index');
Route::get('/login', [StaticPageController::class, 'login'])->name('page.login');

Route::post('/login', [UserController::class, 'login'])->name('login');


Route::middleware("auth")->group(function (){
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::middleware(CheckAdmin::class)->group(function (){
        Route::get('/users', [UserController::class, 'index'])->name('users');
    });

    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
});


