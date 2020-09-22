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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// users endpoint
Route::get('v1/users', 'Api\ApiUserController@index');
Route::get('v1/users/{id}', 'Api\ApiUserController@show');
Route::post('v1/users', 'Api\ApiUserController@create');
Route::put('v1/users/{id}', 'Api\ApiUserController@update');
Route::delete('v1/users/{id}', 'Api\ApiUserController@destroy');

// patriarches endpoint
Route::get('v1/patriarches', 'Api\ApiPatriarchController@index');
Route::get('v1/patriarches/{id}', 'Api\ApiPatriarchController@show');
Route::post('v1/patriarches', 'Api\ApiPatriarchController@create');
Route::put('v1/patriarches/{id}', 'Api\ApiPatriarchController@update');
Route::delete('v1/patriarches/{id}', 'Api\ApiPatriarchController@destroy');

// residents endpoint
Route::get('v1/residents', 'Api\ApiResidentController@index');
Route::get('v1/residents/{id}', 'Api\ApiResidentController@show');
Route::post('v1/residents', 'Api\ApiResidentController@create');
Route::put('v1/residents/{id}', 'Api\ApiResidentController@update');
Route::delete('v1/residents/{id}', 'Api\ApiResidentController@destroy');

// informations
Route::get('v1/informations', 'Api\ApiInformationController@index');
Route::get('v1/informations/{id}', 'Api\ApiInformationController@show');
Route::post('v1/informations', 'Api\ApiInformationController@create');
Route::post('v1/informations/{id}', 'Api\ApiInformationController@update');
Route::delete('v1/informations/{id}', 'Api\ApiInformationController@destroy');
