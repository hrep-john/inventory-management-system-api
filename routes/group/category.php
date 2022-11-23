<?php

use App\Http\Controllers\Api\CategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('categories/all', [CategoryController::class, 'all'])->name('categories.all');
Route::middleware('auth:sanctum')->apiResource('categories', CategoryController::class);
