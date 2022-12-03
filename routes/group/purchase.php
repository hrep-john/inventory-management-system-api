<?php

use App\Http\Controllers\Api\PurchaseController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('purchases/all', [PurchaseController::class, 'all'])->name('purchases.all');
Route::middleware('auth:sanctum')->apiResource('purchases', PurchaseController::class);
