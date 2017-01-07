<?php

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

Route::post('/signup', 'UserController@signUp')->name('signup');

Route::any( '/signin', 'UserController@signIn')->name('signin');

Route::get('user/dashboard', 'UserController@getDashboard')->name('dashboard');

Route::post('admin/create-census', 'RegistrationController@createEvent')->name('create-census');

Route::get('admin/register-official', 'RegistrationController@getRegisterForm');
Route::post('admin/register-official/register', 'RegistrationController@registerOfficial');

