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

// <editor-fold defaultstate="collapsed" desc="--Setting--">
    //Danh sách User
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
    //End Danh sách User

    //Danh sách doanh nghiệp dịch vụ lưu trú
Route::resource('dndvlt','DnDvLtController');
Route::get('dndvlt/checkmasothue/{masothue}','DnDvLtController@CheckMaSoThue');
Route::get('dndvlt/checkuser/{user}','DnDvLtController@CheckUser');
Route::get('dndvlt/delete/{id}','DnDvLtController@destroy');
    //End Danh sách doanh nghiệp dịch vụ lưu trú

    //Danh sách doanh nghiệp dịch vụ vận tải
Route::resource('dndvvt','DnDvVtController');
Route::get('dndvvt/checkmasothue/{masothue}','DnDvVtController@CheckMaSoThue');
Route::get('dndvvt/checkuser/{user}','DnDvVtController@CheckUser');
Route::get('dndvvt/delete/{id}','DnDvVtController@destroy');
    //End Danh sách doanh nghiệp dịch vụ vận tải

    //Cấu hình hệ thống
Route::resource('general','GeneralConfigsController');
    //End Cấu hình hệ thống

//End Setting
// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="--Quản lý--">
    //Giá dịch vụ lưu trú
        //Kê khai thông tin doanh nghiệp
Route::get('ttdndvlt','DvLtController@TtDnIndex');
Route::get('ttdndvlt/{id}/edit','DvLtController@TtDnEdit');
Route::patch('ttdndvlt/{id}','DvLtController@TtDnUpdate');
        //End Kê khai thông tin doanh nghiệp

        //Kê khai thông tin cơ sở kinh doanh
Route::get('ttcskddvlt', 'DvLtController@TtCsKdIndex');
Route::get('ttcskddvlt/create', 'DvLtController@TtCsKdCreate');
Route::get('/ajax/createph/', 'AjaxController@createph');
Route::get('/ajax/editph', 'AjaxController@editph');
Route::get('/ajax/updateph', 'AjaxController@updateph');
Route::get('/ajax/deleteph', 'AjaxController@deleteph');
Route::post('ttcskddvlt', 'DvLtController@TtCsKdStore');
Route::get('ttcskddvlt/{id}/edit', 'DvLtController@TtCsKdEdit');
Route::get('/ajax/chinhsuaph/', 'AjaxController@chinhsuaph');
Route::get('/ajax/capnhatph/', 'AjaxController@capnhatph');
Route::get('/ajax/xoaph/', 'AjaxController@xoaph');
Route::get('/ajax/themmoiph/', 'AjaxController@themmoiph');
Route::patch('ttcskddvlt/{id}', 'DvLtController@TtCsKdUpdate');
        //End Kê khai thông tin cơ sở kinh doanh

        //Kê khai giá dịch vụ lưu trú
Route::get('kkgdvlt/show','DvLtController@KkGDvLtShow');
Route::get('kkgdvlt/{id}','DvLtController@KkGDvLtIndex');
Route::get('kkgdvlt/{id}/create','DvLtController@KkGDvLtCreate');
Route::get('/ajax/editgiaph/', 'AjaxController@editgiaph');
Route::get('/ajax/updategiaph/', 'AjaxController@updategiaph');
Route::post('kkgdvlt/{id}','DvLtController@KkGDvLtStore');
Route::get('kkgdvlt/{idcskd}/{id}/edit','DvLtController@KkGDvLtEdit');
Route::get('/ajax/chinhsuagiaph/', 'AjaxController@chinhsuagiaph');
Route::get('/ajax/capnhatgiaph/', 'AjaxController@capnhatgiaph');
Route::patch('kkgdvlt/{idcskd}/{id}','DvLtController@KkGDvLtUpdate');
Route::post('kkgdvlt/delete/{id}','DvLtController@KkGDvLtDelete');
Route::post('kkgdvlt/chuyen/{id}','DvLtController@KkGDvLtChuyen');
//Xem view kê khai
Route::get('kkgdvlt/viewkk/{id}','ReportsController@kkgdv');
//End Xem

Route::get('xetduyetkkgdvlt','DvLtController@index');
Route::post('xetduyetkkgdvlt/tralai','DvLtController@tralai');
Route::get('/ajax/viewlydo/','AjaxController@viewlydo');
        //End Kê khai giá dịch vụ lưu trú

    //End giá dịch vụ lưu trú

    //Giá dịch vụ vận tải
    //End giá dịch vụ vận tải

// </editor-fold>

