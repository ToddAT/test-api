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

Route::get('/products/{product?}', 'ProductController@index');
Route::post('/products/add', 'ProductController@store');
Route::post('/products/{product}/remove', 'ProductController@destroy');
Route::post('/products/{product}/update', 'ProductController@update');
Route::post('/products/{product}/add/image', 'ProductController@image');

Route::get('/users/{user?}', 'UserController@index');
Route::post('/users/{user}/own/{product}', 'UserController@own');
Route::post('/users/{user}/disown/{product}', 'UserController@disown');
Route::post('/users/{user}/transfer/{product}/to/{newUserID}', 'UserController@transfer');
