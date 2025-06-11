<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PaymentMiddleware;

Route::get('/', function () {
    return redirect()->route('payment.form');
});

Route::group([
    'prefix' => 'payment'
], function() {
    Route::get('/', [PaymentController::class, 'index'])->name('payment.form');
    Route::post('/', [PaymentController::class, 'initiatePayment'])->name('payment.gateway')->middleware(PaymentMiddleware::class);
    Route::post('/verify', [PaymentController::class, 'verify'])->name('payment.verify');
});

