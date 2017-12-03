<?php

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

Route::post('register', 'Api\Auth\RegisterController@register');
Route::post('login', 'Api\Auth\LoginController@login');
Route::post('refresh', 'Api\Auth\LoginController@refresh');

Route::middleware('auth:api')->group(function () {
    Route::post('logout', 'Api\Auth\LoginController@logout');
    Route::get('results', 'Api\ResultController@index');
    Route::post('results', 'Api\ResultController@store');
    Route::get('results/{result}', 'Api\ResultController@show');
    Route::get('user', 'Api\UserController@show');
    Route::post('user', 'Api\UserController@edit');
    Route::post('change', 'Api\UserController@changePassword');
    Route::get('hrdiagnoses', 'Api\HRIndexController@show');
    Route::get('bpdiagnoses', 'Api\BPIndexController@show');
});
