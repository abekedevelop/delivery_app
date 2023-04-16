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

Route::group(['prefix' => 'v1'], static function () {
    Route::patch('/user', 'AdminUserController@setAdmin')->middleware('auth:sanctum', 'abilities:assign_admin');
    Route::get('/orders', 'AdminOrderController@getOrders')->middleware('auth:sanctum', 'abilities:assign_admin');
    Route::patch('/orders', 'AdminOrderController@combineOrders')->middleware('auth:sanctum', 'abilities:assign_admin');
    Route::patch('/orders-decline', 'AdminOrderController@declineOrder')->middleware('auth:sanctum', 'abilities:assign_admin');
    Route::post('/regions', 'AdminRegionController@createRegion')->middleware('auth:sanctum', 'abilities:assign_admin');
});
