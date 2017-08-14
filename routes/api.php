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

Route::get('/user_1', function () {
    var_dump('hiiiiiiiii');die;
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::group(['prefix' => 'api/v1.0/'], function () {
//
//    Route::match(['get', 'post'], 'login', 'MLoginController@login')->middleware('auth:api');
//});

Route::group(['prefix' => '/v1.0/'], function () {

    Route::post('login', function (Request $request) {
        var_dump('<pre>',$request);die;
//        return $request->user();
    });
});
