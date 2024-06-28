<?php

use Illuminate\Http\Request;
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
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\UserController;

Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'getUserProfile']);
Route::middleware('auth:sanctum')->put('/user', [UserController::class, 'updateUserProfile']);

Route::post('/login', [UserController::class, 'login']);



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::apiResource('products', ProductController::class);
Route::post('/apply-coupon', [CouponController::class, 'apply']);
Route::apiResource('cart-items', CartItemController::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
