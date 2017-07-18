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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/mahdieh','testController@test' );
//Route::get('/user','testController@index');
Route::get('/mahdieh/users', 'testController@person_view');
Route::get('/mahdieh/login', 'testController@loginForm');
Route::match(['get','post'],'/mahdieh/signUp', 'testController@signUpForm');
Route::get('/mahdieh/insert','testController@insert_page' );
Route::post('/mahdieh/insert','testController@insert_page' );
Route::get('/profile/{name?}','testController@login_url');
Route::get('/delete/{name?}','testController@delete_user');
Route::match(['get','post'],'/edit/{name?}','testController@edit_profile');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
