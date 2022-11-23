<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('products/all', [ProductController::class, 'all'])->name('products.all');
Route::middleware('auth:sanctum')->post('products/upload-photo', [ProductController::class, 'uploadPhoto'])->name('products.upload-photo');
Route::middleware('auth:sanctum')->post('products/search', [ProductController::class, 'search'])->name('products.search');
Route::middleware('auth:sanctum')->apiResource('products', ProductController::class);
