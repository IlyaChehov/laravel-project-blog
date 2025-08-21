<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('post.index');
//});

Route::redirect('/', 'admin');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/', 'admin.index')->name('index');
    Route::resource('category', CategoryController::class)->except('show');
    Route::resource('tag', TagController::class)->except('show');
});
