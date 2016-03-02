<?php

Route::group(['prefix' => 'clients', 'middleware' => 'auth'], function () {
    Route::get('create', 'ClientsController@create');
    Route::post('store', ['uses' =>'ClientsController@store']);
    Route::get('edit/{id}', ['uses' =>'ClientsController@edit']);
    Route::post('update/{id}', ['uses' =>'ClientsController@update']);
    Route::get('pending', ['uses' =>'ClientsController@pending']);
    Route::get('sent', ['uses' =>'ClientsController@sent']);
    Route::get('canceled', ['uses' =>'ClientsController@canceled']);
});

Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
    Route::resource('list', 'UsersController');
});

Route::group(['middleware' => 'auth'], function()
{
    Route::resource('/', 'DefaultController@index');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::controllers([
    'password' => 'Auth\PasswordController',
]);
