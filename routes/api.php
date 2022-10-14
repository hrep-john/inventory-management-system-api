<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/** Authentication Routes **/
Route::prefix('auth')->group(base_path('routes/group/auth.php'));

/** Product Routes **/
Route::prefix('')->group(base_path('routes/group/product.php'));

/** Category Routes **/
Route::prefix('')->group(base_path('routes/group/category.php'));

/** Unit of Measure (UOM) Routes **/
Route::prefix('')->group(base_path('routes/group/uom.php'));
