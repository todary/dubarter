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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});



Route::group([ 'middleware' => ['throttle:3,10']], function () {

    Route::get('/user/{email}', 'UserController@getUserByEmail');
    Route::get('/users', 'UserController@getUsers');

//    Route::get('/user/{user_id}', function (Request $request) {
//        return response()->json(['name' => 'test']);
//    });


});



//Route::group(['middleware' => ['auth:api']], function () {
//    Route::get('/test', function (Request $request) {
//        return response()->json(['name' => 'test']);
//    });
//});
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
