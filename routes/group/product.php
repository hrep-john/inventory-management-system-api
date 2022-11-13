<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

Route::post('products/upload-photo', [ProductController::class, 'uploadPhoto'])->name('products.upload-photo');
Route::post('products/search', [ProductController::class, 'search'])->name('products.search');
Route::middleware('auth:sanctum')->apiResource('products', ProductController::class);
