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


Route::post('users/login', 'API\UserController@login');
Route::get('users', 'API\UserController@index')->middleware('auth:api');
Route::post('users/create', 'API\UserController@createTraining')->middleware('auth:api');
Route::post('users/search', 'API\UserController@search');
Route::post('users/register', 'API\UserController@register');