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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::resource('authenticate', 'Api\AuthenticateController', ['only' => ['index']]);
Route::post('authenticate', 'Api\AuthenticateController@authenticateEnumerator');

Route::get('user-details/{email}', 'Api\AccountDetailsController@getDetails');