<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'DashboardController@index')->middleware('auth');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::post('/login', 'Auth\LoginController@authenticate');
Route::resource('approved', 'ApprovedController');
Route::resource('notapproved', 'NotApprovedController');
Route::post('notapproved/{id}', 'NotApprovedController@approve');
Route::resource('userdata', 'ResultController');
Route::resource('hrindex', 'HRIndexController');
Route::resource('hrnutrition', 'HRNutritionController');
Route::resource('bpindex', 'BPIndexController');
Route::resource('bpnutrition', 'BPNutritionController');
Route::get('/logout', 'Auth\LoginController@logout');



