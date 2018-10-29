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

//route for blocks table - yana
//show
Route::get('block/{id}', 'BlocksController@show');
//create
Route::post('block', 'BlocksController@create');
//update
Route::put('block', 'BlocksController@create');
//delete
Route::put('/block/{id}', 'BlocksController@destroy');

//Society Table - kinah
 //list society
 Route::get('society/{s_id}', 'SocietyController@show');
 //create new society
 Route::post('society', 'SocietyController@store');
 //update society
 Route::put('update', 'SocietyController@store');
 //delete society
 Route::put('society/{s_id}', 'SocietyController@delete');
 //search society
Route::post('search', 'SocietyController@getSearchResults'); 

//Unit_User Table - khalilah
//show detail unit user
Route::get ('unit_user/{unit_user_id}','Unit_userController@show');      
//create unit user
Route::post ('unit_user','Unit_userController@store');
//update unit user
Route::put ('store','Unit_userController@store');        
//delete unit user
Route::put ('unit_user/{unit_user_id}','Unit_userController@delete');    

//Unit Table - zula
//create unit 
Route::post('create', 'UnitController@create');
//edit unit
Route::put('create', 'UnitController@create');
//show all
Route::get('units', 'UnitController@index');
//show by id
Route::get('units/{id}', 'UnitController@show');
//join table
//Route::get('join', 'UnitController@join');
//show join table
Route::get('show','UnitController@show');