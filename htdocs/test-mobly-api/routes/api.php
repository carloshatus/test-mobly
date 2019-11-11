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

Route::group(['prefix' => 'users'], function () {
    Route::post('/', ['uses' => 'Api\UserController@create']);
    Route::get('/', ['uses' => 'Api\UserController@getAll']);
    Route::get('/{id}', ['uses' => 'Api\UserController@getById']);
    Route::get('/{id}/posts', ['uses' => 'Api\UserController@getPosts']);
    Route::delete('/{id}', ['uses' => 'Api\UserController@delete']);
    Route::put('/{id}', ['uses' => 'Api\UserController@update']);
});

Route::group(['prefix' => 'import'], function () {
    Route::get('/', ['uses' => 'Api\ImportController@import']);
});
