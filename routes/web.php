<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;


Route::get('/', fn () => redirect('/admin/products'));

Route::get('/admin/products', [ProductController::class, 'index']);
Route::post('/admin/products/add', [ProductController::class, 'store']);
Route::get('/products', [ProductController::class, 'showList']);


// Public Product Listing and Cart
Route::get('/products', [ProductController::class, 'showList']);
Route::get('/cart', [CartController::class, 'view']);
Route::post('/cart/update/{id}', [CartController::class, 'update']);
Route::post('/cart/remove/{id}', [CartController::class, 'remove']);


Route::get('/checkout', [OrderController::class, 'showForm']);
Route::post('/checkout', [OrderController::class, 'submit']);


Route::get('/cart', [CartController::class, 'show']);
Route::post('/cart/add', [CartController::class, 'add']);
Route::post('/cart/remove', [CartController::class, 'remove']);
Route::post('/cart/update', [CartController::class, 'update']);



