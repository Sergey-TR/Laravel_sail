<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\OrderController;


Route::group(['prefix' => 'comment'], function () {
    Route::get('/comment/{id}', [CommentController::class, 'create'])->name('comment.comment-create');
    Route::resource('/comment', CommentController::class);
});

Route::get('/', [IndexController::class, 'index'])->name('index.index');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/auth', function () {
    return view('auth.index');
})->name('auth.index');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', AdminIndexController::class)->name('index');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});

Route::get('/order/create', [OrderController::class, 'create'])->name('order.store');
Route::post('/order/create', [OrderController::class, 'store'])->name('order.store');






