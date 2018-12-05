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

        //Unit_User Table - khalilah
        //show detail unit user
        Route::get ('unit_user/{unit_user_id}','UnitUserController@show');      
        //create unit user
        Route::post ('Createunit_user','UnitUserController@store');
        //update unit user
        Route::put ('updateUnituser','UnitUserController@store');        
        //delete unit user
        Route::put ('unit_user/{unit_user_id}','UnitUserController@delete');    
        //search route
        Route::post('searchUnitUser', 'UnitUserController@getSearchResults'); 
        //to User table
        Route::get('check', 'UnitUserController@query');

        //route for blocks table - yana
        //show
        Route::get('block', 'BlocksController@index');
        //create
        Route::post('createBlock', 'BlocksController@create');
        //update
        Route::put('update_Block', 'BlocksController@create');
        //delete
        Route::put('block/{id}', 'BlocksController@destroy');

        //Society Table - kinah
        //list society
        Route::get('society/{s_id}', 'SocietyController@show');
        //create new society
        Route::post('createSociety', 'SocietyController@store');
        //update society
        Route::put('updateSociety', 'SocietyController@store');
        //delete society
        Route::put('society/{s_id}', 'SocietyController@delete');
        //search society
        Route::post('searchSociety', 'SocietyController@getSearchResults'); 

        //Unit Table - Zula
        //create
        Route::post('createUnit', 'UnitController@create');
        //edit unit
        Route::put('updateUnit', 'UnitController@create');
        //show all
        Route::get('units', 'UnitController@index');
        //show by id
        Route::get('units/{id}', 'UnitController@show');
        //delete
        Route::put('deleteUnits/{id}','UnitController@destroy');
        //search
        //Route::post('search', 'SocietyController@getSearchResults'); //search route
        //join table
        //Route::get('join', 'UnitController@join');
        //show join table
        //Route::post('done','UnitController@show');

        //Permission Table - yana
        //Show table (join with staff_management)
        Route::get('showPermission', 'PermissionController@show');
        //Create table permission
        Route::post('createPermission','PermissionController@create');
        //Delete permission
        Route::put('deletePermission/{id}', 'PermissionController@destroy');
        //edit unit
        Route::put('updatePermission', 'PermissionController@create');
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






      





//**PROFILE TABLE - ila*/
Route::get('profile/{id}', 'ProfileController@show');
 //create new society
 Route::post('profile', 'ProfileController@store');
 //update society
 Route::put('storeProfile', 'ProfileController@store');
 //delete society
 Route::put('profile/{id}', 'ProfileController@destroy');
 //show data users and profile table
Route::get('show', 'ProfileController@query');


 //**Parking lot TABLE- ila */
Route::get('parking/{p_id}', 'parkingLotController@show');
//create new parking
Route::post('parking', 'parkingLotController@store');
//update parking
Route::put('store', 'parkingLotController@store');
//delete parking
Route::put('parking/{p_id}', 'parkingLotController@destroy');
 //show data join table
 Route::get('showParking', 'parkingLotController@query');

//entry pass table - kinah
//show entry data
Route::get('entryPass/{entryPass_id}','entryPassController@show');
//create new entry pass
Route::post('entryPass', 'entryPassController@store');
//update entry pass
Route::put('entryStore','entryPassController@store');
//delete entry pass
Route::put('entryPass/{entryPass_id}', 'entryPassController@destroy');
//show data join table
Route::get('findEntry', 'entryPassController@find');

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
