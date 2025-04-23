<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

//redirect url to admin pg
Route::get('/', fn () => redirect('/admin/products'));

//admin product routes
Route::get('/admin/products', [ProductController::class, 'index']);
Route::post('/admin/products/add', [ProductController::class, 'store']);
Route::get('/products', [ProductController::class, 'showList']);
Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit']);
Route::post('/admin/products/update/{id}', [ProductController::class, 'update']);
Route::get('/admin/orders', [App\Http\Controllers\OrderController::class, 'allOrders']);



// product listing and Cart
Route::get('/products', [ProductController::class, 'showList']);
Route::get('/cart', [CartController::class, 'view']);
Route::post('/cart/update/{id}', [CartController::class, 'update']);
Route::post('/cart/remove/{id}', [CartController::class, 'remove']);
Route::get('/products/{id}', [ProductController::class, 'detail']);



//cart routes
Route::get('/cart', [CartController::class, 'show']);
Route::post('/cart/add', [CartController::class, 'add']);
Route::post('/cart/remove', [CartController::class, 'remove']);
Route::post('/cart/update', [CartController::class, 'update']);


//checkout n orders routes
Route::get('/checkout', [OrderController::class, 'showForm']);
Route::post('/checkout', [OrderController::class, 'submit']);
Route::get('/checkout/confirmation', function () {
    return view('checkout.confirmation');
});

