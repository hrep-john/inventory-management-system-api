<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/** POST    /api/auth/login    Log-in to an existing user    Public **/
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
