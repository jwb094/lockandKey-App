<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Public\UsersController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UsersController::class, 'index'])->name('home');

Route::prefix('/')->group(function () {
    Route::post('/login', [UsersController::class, 'login'])->name('login');
    Route::get('/register', [UsersController::class, 'register'])->name('register');
    Route::post('/registeration', [UsersController::class, 'store'])->name('registeration');
    Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
});


Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //Password
    Route::prefix('password')->group(function () {
        Route::get('/new', [PasswordController::class, 'create'])->name('backend.password.add');
        Route::post('/save', [PasswordController::class, 'store'])->name('backend.password.store');
        Route::get('/edit/{password}', [PasswordController::class, 'edit'])->name('backend.password.edit');
        Route::put('/update/{password}', [PasswordController::class, 'update'])->name('backend.password.update');
        Route::delete('/delete/{password}', [PasswordController::class, 'destroy'])->name('backend.password.delete');
    });


    Route::prefix('category')->group(function () {

        Route::get('/', [CategoryController::class, 'index'])->name('backend.category.index');
        Route::get('/new', [CategoryController::class, 'create'])->name('backend.category.create'); // Route to display form
        Route::post('/save', [CategoryController::class, 'store'])->name('backend.category.store'); // Route to handle form submission
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('backend.category.edit');
        Route::put('/update/{category}', [CategoryController::class, 'update'])->name('backend.category.update');
        Route::delete('/delete/{category}', [CategoryController::class, 'destroy'])->name('backend.category.delete');
    });
});
