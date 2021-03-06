<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('menu', 'MenusController@menu');

Route::get('menu/{menu}', 'MenusController@menuItem');

Route::post('cart', 'CartController@addOrderDetails');
Route::post('login', 'AuthenticationController@login');
Route::post('register', 'AuthenticationController@register');


Route::group(['middleware' => 'auth:api'], function(){
Route::post('addMenu', 'MenusController@addMenu');
Route::get('getMenu', 'MenusController@getMenu');
Route::post('deleteMenu/{menu}', 'MenusController@deleteMenu');
Route::post('editMenu/{menu}', 'MenusController@editMenu');
Route::get('getOrder', 'OrderController@getOrder');
Route::get('getOrderDetails/{order}', 'OrderController@getOrderDetails');
Route::get('logout', 'AuthenticationController@logout');
});
