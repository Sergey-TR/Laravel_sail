<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;

Route::get('/', [IndexController::class, 'index'])->name('index.index');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/add', [NewsController::class, 'create'])->name('news.create');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/auth', function () {
    return view('auth.index');
})->name('auth.index');
