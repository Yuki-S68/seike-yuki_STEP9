<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\AccountController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function () {
    return redirect('/products');
});

Route::get('/products/{id}/buy', [ProductController::class, 'buy'])->name('products.buy');
Route::post('/products/{id}/buy', [ProductController::class, 'buyComplete'])->name('products.buyComplete');

Route::resource('products', ProductController::class);

Route::get('/mypage', [MypageController::class, 'index'])->name('mypage.index');

Route::get('/account/edit', [AccountController::class, 'edit'])->name('account.edit');