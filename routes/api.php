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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// List units
Route::get('units','UnitController@index');

// List single unit
Route::get('unit/{id}','UnitController@show');

// Create new unit
Route::post('unit','UnitController@store');

// Update unit
Route::put('store','UnitController@store');

// Delete unit
Route::delete('unit/{id}','UnitController@destroy');

// Search
Route::post('search','UnitController@result');
    

