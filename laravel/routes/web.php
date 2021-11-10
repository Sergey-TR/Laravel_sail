<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InfoRegisterController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\AdminStatusController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SocialsController;


Route::group(['prefix' => 'comment'], function () {
    Route::get('/comment/{id}', [CommentController::class, 'create'])->name('comment.comment-create');
    Route::resource('/comment', CommentController::class);
});

Route::get('/', [IndexController::class, 'index'])->name('index.index');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', AccountController::class)->name('account');
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
        Route::get('/', AdminIndexController::class)->name('index');
        Route::get('/parser', ParserController::class)->name('parser');
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/status', AdminStatusController::class);
    });
});

Route::get('/order/create', [OrderController::class, 'create'])->name('order.store');
Route::post('/order/create', [OrderController::class, 'store'])->name('order.store');

Auth::routes();

Route::get('/info', [InfoRegisterController::class, 'infoRegister'])->name('auth.info');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'guest'], function () {
   Route::get('/vk/link/{social}', [SocialsController::class, 'link'])->name('vk.link');
   Route::get('/vk/{social}/callback', [SocialsController::class, 'callback'])->name('vk.callback');
});
