<?php

use App\Http\Controllers\Api\UomController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->apiResource('uoms', UomController::class);
