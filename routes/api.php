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


Route::post('register','Api\AuthController@register');
Route::post('login','Api\AuthController@login');



Route::group([ 'middleware' => ['throttle:100,10','auth:api']], function () {

    Route::post('/user', 'UserController@createUser');
    Route::put('/user/{email}', 'UserController@updateUser');
    Route::delete('/user/{email}', 'UserController@deleteUser');


});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


