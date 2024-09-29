<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    return view('home');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/', [ShopController::class, 'home'])->name('home');

// Route for Shop Page
Route::get('/shop', [ShopController::class, 'index'])->name('shop');

Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');

Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');

Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/shop/{id}', [ShopController::class, 'show'])->name('show');

Route::get('/comparison', function () {
    return view('comparison');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

// Route สำหรับลบสินค้าออกจากตะกร้า
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');