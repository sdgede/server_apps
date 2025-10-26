<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShipmentController;


Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('checkout', [CheckoutController::class, 'checkout']); // create order + transaction
Route::post('transactions/{transaction}/confirm', [PaymentController::class, 'confirm']); // payment gateway callback
Route::post('orders/{order}/ship', [ShipmentController::class, 'createShipment']);