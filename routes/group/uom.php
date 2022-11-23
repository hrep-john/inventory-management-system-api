<?php

use App\Http\Controllers\Api\UomController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('uoms/all', [UomController::class, 'all'])->name('uoms.all');
Route::middleware('auth:sanctum')->apiResource('uoms', UomController::class);
