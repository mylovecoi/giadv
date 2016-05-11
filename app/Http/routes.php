<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

    // DEFAULT
Route::get('/', 'HomeController@index');

//Setting
    //User
Route::get('login','UsersController@login');
Route::post('signin','UsersController@signin');
Route::get('/logout', 'UsersController@logout');
Route::get('/user/cp', 'UsersController@cp');
Route::post('/user/cpw', 'UsersController@cpw');

Route::get('user','UsersController@index');
Route::resource('user','UsersController');
Route::get('user/delete/{id}','UsersController@destroy');
Route::get('/user/lock/{id}','UsersController@lockuser');
Route::get('/user/unlock/{id}','UsersController@unlockuser');
Route::get('user/permission/{id}','UsersController@permission');
Route::post('/user/permission', 'UsersController@uppermission');

    //Danh sách doanh nghiệp dịch vụ lưu trú

    //Danh sách doanh nghiệp dịch vụ vận tải
//End Setting

