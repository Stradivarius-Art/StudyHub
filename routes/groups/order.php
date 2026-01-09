<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Order\OrderController;

Route::controller(OrderController::class)
    ->middleware('auth:api')
    ->group(function () {
        Route::get('orders', 'index');
        Route::post('orders', 'create');
        Route::delete('orders/{order}', 'cancel');
    });