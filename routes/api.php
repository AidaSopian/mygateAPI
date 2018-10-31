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
    Route::post('login', 'UserController@login');
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

//route for blocks
        //show
        Route::get('block', 'BlocksController@index');
        //create
        Route::post('block', 'BlocksController@create');
        //update
        Route::put('block', 'BlocksController@create');
        //delete
        Route::put('/block/{id}', 'BlocksController@destroy');



//Society Table

        //show detail society
        Route::get ('society/{s_id}','SocietyController@show');
        //create society
        Route::post ('society','SocietyController@store');
        //update society
        Route::put ('update','SocietyController@store');  
        //delete society
        Route::put ('delete/{s_id}','SocietyController@destroy');

//Staff Management Table

        //show detail Staff Management
        Route::get ('staff_show/{staff_id}','StaffManagementController@show');
        //create Staff Management
        Route::post ('staff','StaffManagementController@store');
        //update Staff Management
        Route::put ('staff_update','StaffManagementController@store');  
        //delete Staff Management
        Route::put ('staff_delete/{staff_id}','StaffManagementController@destroy');

//Society 
        //search route 
        Route::post('search', 'SocietyController@getSearchResults'); 


// Unit User Table
    

        //show detail unit user
        Route::get ('unit_user/{unit_user_id}','UnitUserController@show');      
        //create unit user
        Route::post ('unit_user','UnitUserController@store');
        //update unit user
        Route::put ('update','UnitUserController@store');        
        //delete unit user
        Route::put ('UnitUserDelete/{unit_user_id}','UnitUserController@delete');  

// Unit User 

        //search route
        Route::post('searchresult', 'UnitUserController@getSearchResults'); 
        //to User table
        Route::get('check', 'UnitUserController@query');
      

// Unit Table 

        // List units
        Route::get('units','UnitController@index');
        // List single unit
        Route::post('units','UnitController@show');
        // Create new unit
        Route::post('unit','UnitController@store');
        // Update unit
        Route::put('store','UnitController@store');
        // Delete unit
        Route::put('unit_delete/{id}','UnitController@destroy');

// Test 

        Route::get('join','TestController@test_query');
