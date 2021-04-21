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

Route::post('/login','Api\AuthController@login')->name('login');
Route::post('/register','Api\AuthController@register')->name('register');

Route::group(['middleware' => ['auth:api'], 'namespace' => 'Api'],function(){
    Route::get('/verify_user','AuthController@verify');
    Route::resource('todos','TodoController');
});