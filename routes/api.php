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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('login', 'UserController@login')->name('login');
    Route::post('signup', 'UserController@signup');
    Route::get('signup/activate/{token}', 'UserController@signupActivate');   
  
Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'UserController@logout');
        Route::get('user', 'UserController@user');
    });
});

Route::group([
    'namespace' => 'Auth',
    'middleware' => 'api',
    'prefix' => 'password'    
      ], function() {
Route::post('create', 'PasswordResetController@create');
Route::get('find/{token}','PasswordResetController@find');
Route::post('reset','PasswordResetController@reset');
});


/** ROUTE FOR SOCIETY */
 //list society
 Route::get('society/{s_id}', 'SocietyController@show');
 //create new society
 Route::post('society', 'SocietyController@store');
 //update society
 Route::put('society', 'SocietyController@store');
 //delete society
 Route::put('society/{s_id}', 'SocietyController@delete');


//Unit_User Table

//show detail unit user
Route::get ('unit_user/{unit_user_id}','Unit_userController@show');      
//create unit user
Route::post ('unit_user','Unit_userController@store');
//update unit user
Route::put ('store','Unit_userController@store');        
//delete unit user
Route::put ('unit_user/{unit_user_id}','Unit_userController@delete');    

