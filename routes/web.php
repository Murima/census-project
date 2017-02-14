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

use App\Models\TasksModel;
use App\Models\User;

Route::get('/homepage', function () {
    return view('static.index');
});

Route::get('/about', function () {
    return view('static.about');
});

Route::post('/signup', 'UserController@signUp')->name('signup');

Route::any( '/signin', 'UserController@signIn')->name('signin');

Route::get('admin/dashboard', 'UserController@getDashboard')->name('dashboard');

Route::get( 'admin/create-census', ['as'=> 'create-census', function (){
    $id = \App\Models\CensusId::max('id')+10010;

    return view('dashboard')->withId($id);
}]);

Route::post('admin/create-census', 'RegistrationController@createEvent')->name('create-census');
Route::get('admin/view-events', 'RegistrationController@viewEvents')->name('view-events');
Route::any('admin/edit-event/{id}', 'RegistrationController@editEvent')->name('edit-event');
Route::get('admin/view-event/delete-event/{id}', 'RegistrationController@deleteEvent');

Route::any ('admin/register-official', 'UserController@signUpOfficial')->name('register-official');
Route::get('admin/view-users', 'UserController@viewUsers')->name('view-users');
Route::any('admin/edit-user/{id}', 'UserController@editUser');
Route::any('admin/delete-user/{id}', 'UserController@deleteUser');


Route::get('admin/register-enumerator', ['as'=> 'register-enumerator', function (){
    return View::make('register-enumerator');
}]);
Route::post('admin/register-enumerator', 'UserController@signUpEnumerator')->name('register-enumerator');

Route::get('user/image/{filename}', 'UserController@getUserImage')->name('user-image');

Route::get('official/dashboard/', ['as'=> 'dashboard-official', function (){
    return View::make('dashboard-official');
}]);

Route::get('official/search-user', 'TaskListController@listAllUsers')->name('official/search-user');
Route::post('official/search-user', 'TaskListController@searchUser');

Route::get('official/search-user/view-tasks/{id}', 'TaskListController@viewTasks')->name('view-tasks');
Route::get('official/search-user/assign-task/{id}', 'TaskListController@getTaskForm')->name('assign-task');
Route::post('official/search-user/assign-task/{id}', 'TaskListController@assignTask')->name('assign-task');

Route::get('official/search-user/edit-task/{id}/{task_id}', ['as'=>'edit-task', function ($enumerator_id, $task_id) {
    $user = User::where('id', $enumerator_id)->get()->first();
    $task =  TasksModel::where('task_id',$task_id)->get()->first();

    return View::make('edit-tasklist')->with('user', $user)->with('task', $task);
}]);

Route::put('official/search-user/edit-task/{id}/{task_id}', 'TaskListController@editTask')->name('edit-task');

Route::get('official/search-user/delete-task/{task_id}/{id}', 'TaskListController@deleteTask')->name('delete-task');

Route::get('official/form/form-status', 'FormStatus@index');
Route::any('official/form/reject-form/{task_id}/{house_no}', 'FormStatus@rejectForm')->name('reject-form');
Route::any('official/form/accept-form/{task_id}/{house_no}', 'FormStatus@acceptForm')->name('accept-form');


Route::get('official/show-graphs', 'ChartController@genderAgegroup');
Route::get('official/show-graph', 'ChartController@genderDistribution');