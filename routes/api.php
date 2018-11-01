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


/*BLOCKS CONTROLLER*/
//show
Route::get('block', 'BlocksController@index');
//create
Route::post('block', 'BlocksController@create');
//update
Route::put('block', 'BlocksController@create');
//delete
Route::put('/block/{id}', 'BlocksController@destroy');


/*Society Tabl*/
//show detail society
Route::get ('society/{s_id}','SocietyController@show');
//create societ  
Route::post ('society','SocietyController@store');
//update society
Route::put ('society','SocietyController@store');  
//delete society
Route::put ('society/{s_id}','SocietyController@destroy');


/*UNIT_USER TABLE*/
//show detail unit user
Route::get ('unit_user/{unit_user_id}','UnitUserController@show');      
//create unit user
Route::post ('unit_user','UnitUserController@store');
//update unit user
Route::put ('store','UnitUserController@store');        
//delete unit user
Route::put ('unit_user/{unit_user_id}','UnitUserController@delete');    
//search route
Route::post('search', 'UnitUserController@getSearchResults'); 
//to User table
Route::get('check', 'UnitUserController@query');
      

/*UNIT CONTROLLER*/ 
//create
Route::post('create', 'UnitController@create');
//edit or update
Route::put('create', 'UnitController@create');
//show all
Route::get('units', 'UnitController@index');
//show by id
//Route::get('units/{id}', 'UnitController@show');
//delete
Route::put('delete/{id}','UnitController@destroy');
//show join table
Route::post('done','UnitController@show');
//join table
//Route::get('join', 'UnitController@join');


/*ENTRY CONTROLLER*/ 
//create
Route::post('createEntry', 'EntryController@create');
//edit and update
Route::put('updateEntry', 'EntryController@create');
//search id
Route::post('searchEntry', 'EntryController@show');
//delete by update status
Route::put('remove/{entryPass_id}', 'EntryController@destroy');


/*PARKING CONTROLLER*/ 
//create
Route::post('createParking', 'ParkingController@create');
//edit and update
Route::put('updateParking', 'ParkingController@create');
//search id
Route::post('searchParking', 'ParkingController@show');


/*PARKING CONTROLLER*/ 
//create
Route::post('createStaff', 'StaffController@create');
//edit and update
Route::put('updateStaff', 'StaffController@create');
//search id
Route::post('searchStaff', 'StaffController@show');



/*PERMISSION CONTROLLER*/ 
//create
Route::post('createPermission', 'PermissionController@create');
//edit and update
Route::put('updatePermission', 'PermissionController@create');
//search id
Route::post('searchPermission', 'PermissionController@show');


/*PROFILE CONTROLLER*/ 
//create
Route::post('createProfile', 'ProfileController@create');
//edit and update
Route::put('updateProfile', 'ProfileController@create');
//search id
Route::post('searchProfile', 'ProfileController@show');