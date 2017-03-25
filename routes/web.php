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

use App\Models\FormStatusModel;
use App\Models\TasksModel;
use App\Models\User;

Route::get('/homepage', function () {
    return view('static.index');
});

Route::get('/about', function () {
    return view('static.about');
});

Route::pos('/signup', 'UserController@signUp')->name('signup');

Route::any( '/signin', 'UserController@signIn')->name('signin');
Route::get('/signout', 'UserController@signOut')->name('signout');

Rote::get('admin/dashboard', 'UserController@getDashboard')->name('dashboard');

Route::get( 'admin/create-census', ['as'=> 'create-census', function (){
    $id = \App\Models\CensusId::max('id')+10010;

    return view('dashboard')->withId($id);
}]);

Route::any('admin/edit-event/{id}', 'RegistrationController@editEvent')->name('edit-event');
Route::get('admin/view-event/delete-event/{id}', 'RegistrationController@deleteEvent');

Route::any ('admin/register-official', 'UserController@signUpOfficial')->name('register-official');
Route::get('admin/view-users', 'UserController@viewUsers')->name('view-users');


Route::get('admin/register-enumerator', ['as'=> 'register-enumerator', function (){
    return View::make('register-enumerator');
}]);
Route::post('admin/register-enumerator', 'UserController@signUpEnumerator')->name('register-enumerator');

Route::get('user/image/{filename}', 'UserController@getUserImage')->name('user-image');

Route::get('official/dashboard/', 'DashboardController@index')->name('dashboard-official');
Route::any('official/reference-form/decline/{status_id}', 'DashboardController@declineForm')->name('decline-form');
Route::any('official/reference-form/confirm/{status_id}', 'DashboardController@confirmForm')->name('confirm-form');

Route::get('official/profile-page', 'UserController@showUserProfile');


Route::get('official/search-user', 'TaskListController@listAllUsers')->name('official/search-user');
Route::post('official/search-user', 'TaskListController@searchUser');

Route::get('official/search-user/view-tasks/{id}', 'TaskListController@viewTasks')->name('view-tasks');

Route::get('official/search-user/edit-task/{id}/{task_id}', ['as'=>'edit-task', function ($enumerator_id, $task_id) {
    $user = User::where('id', $enumerator_id)->get()->first();
    $task =  TasksModel::where('task_id',$task_id)->get()->first();

    return View::make('edit-tasklist')->with('user', $user)->with('task', $task);
}]);

Rout::put('official/search-user/edit-task/{id}/{task_id}', 'TaskListController@editTask')->name('edit-task');

Route::get('official/search-user/delete-task/{task_id}/{id}', 'TaskListController@deleteTask')->name('delete-task');

Route::get('official/form/form-status', 'FormStatus@index');
Route::any('official/form/reject-form/{task_id}/{house_no}/{status_id}', 'FormStatus@rejectForm')->name('reject-form');

/*Route::get('official/show-graphs', 'ChartController@testChart');*/
Route::get('official/show-graphs', 'ChartController@index')->name('show-graphs');
Rout::get('official/show-graph/{category?}/{variation?}', 'ChartController@chartCategory')->name('show-graph');

//Route::get('official/testchart/', 'ChartController@testChart2');
Route::get('official/testme/{typ?}', 'ChartController@testCat');

//Route::get('official/testme/{cat?}', 'FormStatus@testMe')->name('testme');