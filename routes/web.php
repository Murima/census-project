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

Route::get('admin/dashboard', 'UserController@getDashboard')->name('dashboard');

Route::get( 'admin/create-census', ['as'=> 'create-census', function (){
    return View::make('dashboard');
}]);

Route::post('admin/create-census', 'RegistrationController@createEvent')->name('create-census');

Route::any ('admin/register-official', 'UserController@signUpOfficial')->name('register-official');

Route::get('admin/register-enumerator', ['as'=> 'register-enumerator', function (){
    return View::make('register-enumerator');
}]);

Route::post('admin/register-enumerator', 'UserController@signUpEnumerator')->name('register-enumerator');

Route::get('user/image/{filename}', 'UserController@getUserImage')->name('user-image');

Route::get('official/dashboard/', ['as'=> 'dashboard-official', function (){
    return View::make('dashboard-official');
}]);

Route::get('official/search-user', ['as'=> 'official/search-user', function(){
    return View::make('dashboard-official-search');
}]);

Route::post('official/search-user', 'TaskListController@searchUser');

Route::get('official/search-user/assign-task/{id}', 'TaskListController@getTaskForm')->name('assign-task');
Route::post('official/search-user/assign-task/{id}', 'TaskListController@assignTask')->name('assign-task');

Route::any('official/search-user/edit-task/{id}', 'TaskListController@editTask')->name('edit-task');
