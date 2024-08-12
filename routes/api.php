<?php

use App\Http\Controllers\Api\DeliveryOptionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('delivery-options', [DeliveryOptionsController::class, 'show'])->name('deliveryOptions');
