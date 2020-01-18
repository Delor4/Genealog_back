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

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('persons', 'PersonApiController@index');
        Route::get('persons/{person}', 'PersonApiController@show');
        Route::post('persons', 'PersonApiController@store');
        Route::put('persons/{person}', 'PersonApiController@update');
        Route::delete('persons/{person}', 'PersonApiController@delete');
    });
    Route::post('register', 'Auth\RegisterController@register');
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::post('logout', 'Auth\LoginController@logout');