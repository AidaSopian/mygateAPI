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
 //test controller
 Route::get('/', 'TestController@test_query');

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

//Blocks Table
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

//Society 

        //search route 
        Route::post('search', 'SocietyController@getSearchResults'); 

//Staff Management Table Nik 

        //show detail Staff Management
        Route::get ('staff_show/{staff_id}','StaffManagementController@show');
        //create Staff Management
        Route::post ('staff','StaffManagementController@store');
        //update Staff Management
        Route::put ('staff_update','StaffManagementController@store');  
        //delete Staff Management
        Route::put ('staff_delete/{staff_id}','StaffManagementController@destroy');
        //show data join table
        Route::get ('staff_join', 'StaffManagementController@query');


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






//join table
//Route::get('join', 'UnitController@join');
//show join table
//Route::post('done','UnitController@show');




//Permission Table
///Show table (join with staff_management)
Route::get('showPermission', 'PermissionController@show');
//Create table permission
Route::post('createPermission','PermissionController@create');
//Delete permission
Route::put('deletePermission/{id}', 'PermissionController@destroy');

//**PROFILE TABLE - ila*/

        Route::get('profile/{id}', 'ProfileController@show');
        //create new society
        Route::post('profile', 'ProfileController@store');
        //update society
        Route::put('store', 'ProfileController@store');
        //delete society
        Route::put('profile/{id}', 'ProfileController@destroy');
        //show data users and profile table
        Route::get('show', 'ProfileController@query');

 //**Parking lot TABLE- ila */

        Route::get('parking/{p_id}', 'parkingLotController@show');

        //create new society
        Route::post('parking', 'parkingLotController@store');

        //update society
        Route::put('store', 'parkingLotController@store');

        //delete society
        Route::put('parking/{p_id}', 'parkingLotController@destroy');

        //show data join table
        Route::get('showParking', 'parkingLotController@query');
