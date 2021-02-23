<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth.role'], function () {
    Route::get('/departments', 'Departments@index');
    Route::post('/departments/store', 'Departments@store');
    Route::put('/departments/update/{id}', 'Departments@update');
    Route::delete('/departments/delete/{id}', 'Departments@destroy');

    // routes of jobs
    Route::get('/jobs', 'JobsController@index');
    Route::post('/jobs/store', 'JobsController@store');
    Route::put('/jobs/update/{id}', 'JobsController@update');
    Route::delete('/jobs/delete/{id}', 'JobsController@destroy');

    // route of  users
    Route::get('/users', 'UserController@index');
    Route::get('/users/department/{id}', 'UserController@getUserDepartment');
//    ali
    Route::put('/users/edit/{id}', 'UserController@editUser');
});

// authinticate user
Route::post('login', 'AuthController@login');
//Route::get('products', ['middleware' => 'auth.role:admin,user', 'uses' => 'ProductController@index', 'as' => 'products']);


Route::post('register', 'AuthController@Register')->name('usersRegister');
