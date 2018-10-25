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
], function () {    
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});


      //Society Table

      //show detail society
      Route::get ('society/{s_id}','SocietyController@show');
      
      //create society
      Route::post ('society','SocietyController@store');

      //update society
      Route::put ('store','SocietyController@store');  
      

      //delete society
      Route::delete ('society/{s_id}','SocietyController@delete');


      //Unit_User Table

      //show detail unit user
      Route::get ('unit_user/{unit_user_id}','Unit_userController@show');
      
      //create unit user
      Route::post ('unit_user','Unit_userController@store');

      //update unit user
      Route::put ('store','Unit_userController@store');  
      
      //delete unit user
      Route::put ('unit_user/{unit_user_id}','Unit_userController@delete');


      
//create
Route::post('create', 'UnitController@create');
//edit or update
Route::put('create', 'UnitController@create');
//show all
Route::get('units', 'UnitController@index');
//show by id
Route::get('units/{id}', 'UnitController@show');
//delete
Route::put('delete/{id}','UnitController@destroy');
