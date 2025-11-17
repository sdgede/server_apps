<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\OfferController;

// Redirect root ke dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Route login/register bawaan Laravel + AdminLTE
Auth::routes();

// Semua menu admin wajib login
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD Products
    Route::resource('products', ProductController::class);

    // CRUD Users
    Route::resource('users', UserController::class);

    // CRUD Payment Methods
    Route::resource('payment', PaymentMethodController::class);

    // Offer
    Route::get('offer/create', [OfferController::class, 'create'])->name('offer.create');
    Route::post('offer/store', [OfferController::class, 'store'])->name('offer.store');
});
