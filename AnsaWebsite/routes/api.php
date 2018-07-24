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
Route::get('logout', 'AuthenticationController@logout');
});
