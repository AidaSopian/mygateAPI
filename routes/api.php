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
 Route::put('store', 'SocietyController@store');
 //delete society
 Route::put('society/{s_id}', 'SocietyController@delete');


/** ROUTE FOR UNIT USER */
//list unit user
Route::get('UnitUser/{unit_user_id}', 'UnitUserController@show');
//create new unit user
Route::post('UnitUser', 'UnitUserController@store');
//update unit user
Route::put('store', 'UnitUserController@store');
//delete unit user
Route::delete('UnitUser/{unit_user_id}', 'UnitUserController@delete');

 