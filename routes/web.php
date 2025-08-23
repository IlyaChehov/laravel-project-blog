<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'admin');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/', 'admin.index')->name('index');
    Route::resource('categories', CategoryController::class)->except('show');
    Route::resource('tags', TagController::class)->except('show');

    Route::get('/posts/basket', [PostController::class, 'basket'])
        ->name('posts.basket');

    Route::get('/posts/basket/{id}', [PostController::class, 'basketRestore'])
        ->name('posts.basket.restore');
    Route::delete('/posts/basket/{id}',
        [PostController::class, 'basketDestroy'])->name('posts.basket.destroy');

    Route::resource('posts', PostController::class);
});
