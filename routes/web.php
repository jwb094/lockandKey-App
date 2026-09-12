<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\UserAccountController;
use App\Http\Controllers\Public\UsersController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UsersController::class, 'index'])->name('login');

Route::prefix('/')->group(function () {
    Route::post('/login', [UsersController::class, 'login'])->name('login.auth');
    Route::get('/register', [UsersController::class, 'register'])->name('register');
    Route::post('/registeration', [UsersController::class, 'store'])->name('registeration');
    Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
});


Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::put('/profile/update/{id}', [UserAccountController::class, 'update'])->name('backend.user.update');
    Route::get('/profile', [UserAccountController::class, 'edit'])->name('backend.user.edit');

    //Password
    Route::resource('password', PasswordController::class)
        ->names('backend.password');


    Route::resource('category', CategoryController::class)
        ->names('backend.category');
});
