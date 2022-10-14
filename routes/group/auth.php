<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/** POST    /api/auth/login    Log-in to an existing user    Public **/
Route::post('login', [AuthController::class, 'login'])->name('auth.login');

/** POST    /api/auth/logout    Log-out the current auth user    Private **/
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout'])->name('logout');
