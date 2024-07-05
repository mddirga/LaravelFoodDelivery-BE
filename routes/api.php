<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// REGISTER - USER
Route::post('/user/register', [App\Http\Controllers\Api\AuthController::class, 'userRegister']);

// REGISTER - RESTAURANT
Route::post('/restaurant/register', [App\Http\Controllers\Api\AuthController::class, 'restaurantRegister']);

// REGISTER - DRIVER
Route::post('/driver/register', [App\Http\Controllers\Api\AuthController::class, 'driverRegister']);

// LOGIN
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);

// LOGOUT
Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout'])->middleware('auth:sanctum');

// UPDATE LATLONG
Route::put('/user/update-latlong', [App\Http\Controllers\Api\AuthController::class, 'updateLatLong'])->middleware('auth:sanctum');



// GET ALL RESTAURANT
Route::get('/restaurant', [App\Http\Controllers\Api\AuthController::class, 'getRestaurant']);

Route::apiResource('/products', App\Http\Controllers\Api\ProductController::class)->middleware('auth:sanctum');

// GET PRODUCT BY USER ID
Route::get('/restaurant/{userId}/products', [App\Http\Controllers\Api\ProductController::class, 'getProductByUserId'])->middleware('auth:sanctum');

// ORDER
Route::post('/order', [App\Http\Controllers\Api\OrderController::class, 'createOrder'])->middleware('auth:sanctum');

// UPDATE PURCHASE STATUS
Route::put('/order/user/update-status/{id}', [App\Http\Controllers\Api\OrderController::class, 'updatePurchaseStatus'])->middleware('auth:sanctum');

// GET ORDER BY USER ID
Route::get('/order/user', [App\Http\Controllers\Api\OrderController::class, 'orderHistory'])->middleware('auth:sanctum');

// GET ORDER BY RESTAURANT ID
Route::get('/order/restaurant', [App\Http\Controllers\Api\OrderController::class, 'getOrdersByStatus'])->middleware('auth:sanctum');

// GET ORDER BY DRIVER ID
Route::get('/order/driver', [App\Http\Controllers\Api\OrderController::class, 'getOrdersByStatusDriver'])->middleware('auth:sanctum');

// UPDATE ORDER STATUS
Route::put('/order/restaurant/update-status/{id}', [App\Http\Controllers\Api\OrderController::class, 'updateOrderStatus'])->middleware('auth:sanctum');

// UPDATE ORDER STATUS DRIVER
Route::put('/order/driver/update-status/{id}', [App\Http\Controllers\Api\OrderController::class, 'updateOrderStatusDriver'])->middleware('auth:sanctum');