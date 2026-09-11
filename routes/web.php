<?php

use App\Http\Controllers\Public\UsersController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UsersController::class, 'index'])->name('home');

Route::prefix('/')->group(function () {
    Route::post('/login',[UsersController::class, 'login'])->name('login');
    Route::get('/register', [UsersController::class, 'register'])->name('register');
    Route::post('/registeration', [UsersController::class, 'store'])->name('registeration');
    Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
});


Route::prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    })->name('dashboard');
    //Password
    Route::prefix('password')->group(function () {
        Route::get('/new', function () {
            return view('backend.password.add');
        })->name('backend.password.add');
        //Route::post('/save', [PasswordManagerController::class, 'store'])->name('password.store');
        Route::get('/show/{id}', function () {
            return view('backend.password.edit');
        })->name('backend.password.show');
        Route::get('/edit/{id}', function () {
            return view('backend.password.edit');
        })->name('backend.password.edit');
        // Route::post('/update/{id}', [PasswordManagerController::class, 'update'])->name('password.update');
        // Route::delete('/delete/{id}', [PasswordManagerController::class, 'delete'])->name('password.delete');
    });


    Route::prefix('category')->group(function () {

        Route::get('/', function () {
            return view('backend.passwordCategory.index');
        })->name('category.index');
        Route::get(
            '/new',
            function () {
                return view('backend.passwordCategory.edit');
            }
        )->name('category.store'); // Route to display form
        //Route::post('/save', [PasswordCategoryController::class, 'storeData'])->name('category.save'); // Route to handle form submission
        Route::get('/show/{id}', function () {
            return view('backend.passwordCategory.show');
        })->name('category.show');
        Route::get('/edit/{id}', function () {
            return view('backend.passwordCategory.edit');
        })->name('category.edit');
        //   Route::post('/update/{id}', [PasswordCategoryController::class, 'updateData'])->name('category.update');
        //   Route::delete('/delete/{id}', [PasswordCategoryController::class, 'destroy'])->name('categories.destroy');
    });
});
