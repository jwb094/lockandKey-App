<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [AuthManager::class, 'home'])->name('home');

Route::prefix('/')->group(function () {
    Route::post('/login', [AuthManager::class, 'login'])->name('login');
    Route::get('/register', [AuthManager::class, 'register'])->name('register');
    Route::post('/registeration', [AuthManager::class, 'register'])->name('registeration');
    Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
});


Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/dashboard', [PasswordManagerController::class, 'dashboard'])->name('dashboard');
    //Password
    Route::prefix('password')->group(function () {
        Route::get('/new', [PasswordManagerController::class, 'add'])->name('password.add');
        Route::post('/save', [PasswordManagerController::class, 'store'])->name('password.store');
        Route::get('/show/{id}', [PasswordManagerController::class, 'readPassword'])->name('password.read');
        Route::get('/edit/{id}', [PasswordManagerController::class, 'editPassword'])->name('password.edit');
        Route::post('/update/{id}', [PasswordManagerController::class, 'update'])->name('password.update');
        Route::delete('/delete/{id}', [PasswordManagerController::class, 'delete'])->name('password.delete');
    });


    Route::prefix('category')->group(function () {
        Route::get('/new', [PasswordCategoryController::class, 'showForm'])->name('category.store'); // Route to display form
        Route::post('/save', [PasswordCategoryController::class, 'storeData'])->name('category.save'); // Route to handle form submission
        Route::get('/show/{id}', [PasswordCategoryController::class, 'readData'])->name('category.show');
        Route::get('/edit/{id}', [PasswordCategoryController::class, 'editData'])->name('category.edit');
        Route::post('/update/{id}', [PasswordCategoryController::class, 'updateData'])->name('category.update');
        Route::delete('/delete/{id}', [PasswordCategoryController::class, 'destroy'])->name('categories.destroy');
    });



});
