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
   Route::post('/register', 'UserController@register');
   Route::get('/regions', 'RegionController@getRegions');
   Route::post('/login', 'AuthController@authenticate');
   Route::post('/order', 'OrderController@create')->middleware('auth:sanctum', 'abilities:create_order');
});
