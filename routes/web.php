<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/emp_users/{user}', 'emp_userController@user_details')->name('profile.show');

Route::get('/new_emp/create','emp_userController@create');

Route::post('/new_emp','emp_userController@store');

Route::get('/emp_users/{user}/edit','emp_userController@edit_user');

Route::patch('/emp_users/{user}', 'emp_userController@update');

Route::post('/emp_users/delete/{user}', 'emp_userController@delete');

Route::get('/WPAPI','APIController@api_call');