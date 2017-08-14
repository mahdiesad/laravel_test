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

///////   Admin Route
use App\User;

    Route::group(['prefix' => '' , 'middleware' => ['auth', 'admin']], function () {
        Route::match(['post','get'],'/mahdieh/users','AdminController@viewUser' );
        Route::get('/delete/{name?}','AdminController@delete_user');
        Route::match(['get','post'],'/edit/{name?}','AdminController@edit_profile');
        Route::get('/profile/{name?}','AdminController@profile');
        Route::get('/myprofile',function (){



               return view('myprofile');

        });
        });
//////  User route
    Route::group(['prefix' => ''], function () {
        Route::match(['post','get'],'/home','UserController@homePage' );
        Route::match(['post','get'],'/friends','UserController@friendPage' );
        Route::match(['post','get'],'/friends_req','UserController@friends_req' );
        Route::match(['post','get'],'/friends_remove','UserController@friends_remove' );
        Route::match(['post','get'],'/send_req','UserController@sendReq' );
        Route::match(['post','get'],'/sendpost','UserController@send_post' );


    });


//////    LogIn Route
    Route::group(['prefix' => ''], function () {
        //  Route::match(['post','get'],'/login', 'Auth\LoginController@login');
        Route::match(['get','post'],'login',['as' => 'login','uses' =>'Auth\LoginController@login']);

          Route::get('/logout', 'Auth\LoginController@getLogout');
        });
////// SignUp Route
    Route::group(['prefix' => ''], function () {
        Route::match(['get', 'post'], '/signup', 'Auth\RegisterController@registerReal');
        Route::post('/checkUsername', 'Auth\RegisterController@checkUsername');
        //Route::post('upload', 'RegisterController@upload');
    });

//Route::get('/home', 'HomeController@index')->name('home');

    ///////////////////////////Route::get('login', ['as' => 'login', 'uses' => 'LoginController@getView']);
//Auth::routes();
//Route::get('login','Auth\LoginController@login');

Route::get('/', function () {
    return view('welcome');
});
//Auth::routes();
//Route::group(['prefix' => 'api/v1.0/'], function () {
//
//    Route::match(['get', 'post'], 'login', 'MLoginController@login');
//});
//
//
//Route::get('/mahdieh','testController@test' );
////Route::get('/user','testController@index');
////Route::get('/mahdieh/users', 'testController@login');
//Route::get('/mahdieh/login', 'testController@loginForm');
//Route::match(['get','post'],'/mahdieh/signUp', 'testController@signUpForm');
//Route::get('/mahdieh/insert','testController@insert_page' );
//Route::post('/mahdieh/insert','testController@insert_page' );
//Route::get('/profile/{name?}','testController@login_url');
//Route::get('/delete/{name?}','testController@delete_user');
//Route::match(['get','post'],'/edit/{name?}','testController@edit_profile');
//
////Route::get('/login', 'Auth/LoginController@login');
//Route::get('/mahdieh/users', 'testController@person_view');
//
////Auth::routes();
//
////Route::get('/home', 'HomeController@index')->name('home');
//
//Route::group(['prefix' => ''], function () {
//    Route::match(['get','post'],'/signup', 'Auth\RegisterController@registerReal');
//   Route::post('/checkUsername', 'Auth\RegisterController@checkUsername');
//
//    ///Route::get('/auth/checkVerificationCode', 'Auth\RegisterController@checkVerificationCode');
//
//});
//Route::group(['prefix' => ''], function () {
//   // Route::get('/login', 'Auth\LoginController@login');
//  //  Route::get('/login', 'testController@login');
//  ///  Route::post('login', [ 'as' => 'login', 'uses' => 'testController_succ']);
//
////    Route::get('/auth/checkUsername', 'Auth\AuthController@checkUsername');
////
////    Route::get('/auth/checkVerificationCode', 'Auth\AuthController@checkVerificationCode');
//    });

