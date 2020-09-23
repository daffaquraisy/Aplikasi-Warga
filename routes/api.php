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

Route::post('register', 'Api\ApiAuthController@register');
Route::post('login', 'Api\ApiAuthController@login');
Route::get('auth-user', 'Api\ApiAuthController@getAuthenticatedUser')->middleware('jwt.verify');

// users endpoint
Route::get('v1/users', 'Api\ApiUserController@index')->middleware('jwt.verify');
Route::get('v1/users/{id}', 'Api\ApiUserController@show')->middleware('jwt.verify');
Route::post('v1/users', 'Api\ApiUserController@create')->middleware('jwt.verify');
Route::put('v1/users/{id}', 'Api\ApiUserController@update')->middleware('jwt.verify');
Route::delete('v1/users/{id}', 'Api\ApiUserController@destroy')->middleware('jwt.verify');

// patriarches endpoint
Route::get('v1/patriarches', 'Api\ApiPatriarchController@index')->middleware('jwt.verify');
Route::get('v1/patriarches/{id}', 'Api\ApiPatriarchController@show')->middleware('jwt.verify');
Route::post('v1/patriarches', 'Api\ApiPatriarchController@create')->middleware('jwt.verify');
Route::put('v1/patriarches/{id}', 'Api\ApiPatriarchController@update')->middleware('jwt.verify');
Route::delete('v1/patriarches/{id}', 'Api\ApiPatriarchController@destroy')->middleware('jwt.verify');

// residents endpoint
Route::get('v1/residents', 'Api\ApiResidentController@index')->middleware('jwt.verify');
Route::get('v1/residents/{id}', 'Api\ApiResidentController@show')->middleware('jwt.verify');
Route::post('v1/residents', 'Api\ApiResidentController@create')->middleware('jwt.verify');
Route::put('v1/residents/{id}', 'Api\ApiResidentController@update')->middleware('jwt.verify');
Route::delete('v1/residents/{id}', 'Api\ApiResidentController@destroy')->middleware('jwt.verify');

// informations
Route::get('v1/informations', 'Api\ApiInformationController@index')->middleware('jwt.verify');
Route::get('v1/informations/{id}', 'Api\ApiInformationController@show')->middleware('jwt.verify');
Route::post('v1/informations', 'Api\ApiInformationController@create')->middleware('jwt.verify');
Route::post('v1/informations/{id}', 'Api\ApiInformationController@update')->middleware('jwt.verify');
Route::delete('v1/informations/{id}', 'Api\ApiInformationController@destroy')->middleware('jwt.verify');
