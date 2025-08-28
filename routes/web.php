<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function() {
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'authentication'])->name('authentication');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::view('/', 'admin.index')->name('index');
    Route::resource('categories', CategoryController::class)->except('show');
    Route::resource('tags', TagController::class)->except('show');

    Route::get('/posts/basket', [PostController::class, 'basket'])->name('posts.basket');

    Route::get('/posts/basket/{id}', [PostController::class, 'basketRestore'])->name('posts.basket.restore');
    Route::delete('/posts/basket/{id}', [PostController::class, 'basketDestroy'])->name('posts.basket.destroy');

    Route::resource('posts', PostController::class);
//    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::prefix('users')->name('users.')->group(function() {
       Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');
    });

});



Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/category/{category}', [HomeController::class, 'category'])->name('home.category');
Route::get('/{post}', [HomeController::class, 'show'])->name('home.show');
