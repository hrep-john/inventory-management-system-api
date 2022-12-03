<?php

use App\Http\Controllers\Api\SaleController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('sales/all', [SaleController::class, 'all'])->name('sales.all');
Route::middleware('auth:sanctum')->apiResource('sales', SaleController::class);
