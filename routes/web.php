<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LikeController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/index', [ProductController::class, 'index'])
    ->middleware('auth')
    ->name('index');

Route::get('/products/{id}/buy', [ProductController::class, 'buy'])
     ->middleware('auth')
     ->name('products.buy');
Route::post('/products/{id}/buy', [ProductController::class, 'buyComplete'])
     ->middleware('auth')
     ->name('products.buyComplete');

Route::resource('products', ProductController::class)
     ->only(['index', 'show', 'update', 'destroy'])
     ->middleware(['show' => 'auth', 'update' => 'auth', 'destroy' => 'auth']);

Route::get('/mypage', [MypageController::class, 'index'])
    ->middleware('auth')
    ->name('mypage.index');

Route::get('/mypage/sale_item/{id}', [MypageController::class, 'showSaleItem'])
     ->middleware('auth')
     ->name('mypage.sale_item');
Route::get('/mypage/products/{id}/edit', [MypageController::class, 'editItem'])
     ->middleware('auth')
     ->name('mypage.edit_item');

Route::get('/account/edit', [AccountController::class, 'edit'])
     ->middleware('auth')
     ->name('account.edit');
Route::post('/account/update', [AccountController::class, 'update'])
     ->middleware('auth')
     ->name('account.update');

Route::get('/emails', [ContactController::class, 'showForm'])->name('emails.form');
Route::post('/emails', [ContactController::class, 'submitForm'])->name('emails.submit');

Route::post('/products/{product}/like', [LikeController::class, 'likeProduct'])
     ->middleware('auth');
Route::delete('/products/{product}/like', [LikeController::class, 'unlikeProduct'])
     ->middleware('auth');

Route::get('/mypage/products/create', [MypageController::class, 'createItem'])
    ->middleware('auth')
    ->name('mypage.create_item');

Route::post('/mypage/products/store', [MypageController::class, 'storeItem'])
    ->middleware('auth')
    ->name('mypage.store_item');

