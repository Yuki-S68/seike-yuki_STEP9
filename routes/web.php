<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FavoriteController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', function () {
    return redirect('/products');
});

Route::get('/products/{id}/buy', [ProductController::class, 'buy'])->name('products.buy');
Route::post('/products/{id}/buy', [ProductController::class, 'buyComplete'])->name('products.buyComplete');

Route::resource('products', ProductController::class);

Route::get('/mypage', [MypageController::class, 'index'])
    ->middleware('auth')
    ->name('mypage.index');

Route::get('/mypage/sale_item/{id}', [MypageController::class, 'showSaleItem'])
     ->name('mypage.sale_item');

Route::get('/mypage/products/{id}/edit', [MypageController::class, 'editItem'])
     ->name('mypage.edit_item');

Route::get('/account/edit', [AccountController::class, 'edit'])->name('account.edit');
Route::post('/account/update', [AccountController::class, 'update'])->name('account.update');

Route::get('/emails', [ContactController::class, 'showForm'])->name('emails.form');
Route::post('/emails', [ContactController::class, 'submitForm'])->name('emails.submit');

Route::post('/products/{product}/favorite', [FavoriteController::class, 'addFavorite'])->name('favorite.add');
Route::delete('/products/{product}/favorite', [FavoriteController::class, 'removeFavorite'])->name('favorite.remove');

Route::get('/mypage/products/create', [MypageController::class, 'createItem'])
    ->middleware('auth')
    ->name('mypage.create_item');

Route::post('/mypage/products/store', [MypageController::class, 'storeItem'])
    ->middleware('auth')
    ->name('mypage.store_item');

    