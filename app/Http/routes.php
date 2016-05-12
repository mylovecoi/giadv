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

//End Setting


//Quản lý
    //Giá dịch vụ lưu trú
        //Kê khai thông tin doanh nghiệp
Route::get('ttdndvlt','DvLtController@TtDnIndex');
Route::get('ttdndvlt/{id}/edit','DvLtController@TtDnEdit');
Route::patch('ttdndvlt/{id}','DvLtController@TtDnUpdate');
        //End Kê khai thông tin doanh nghiệp

        //Kê khai thông tin cơ sở kinh doanh
Route::get('ttcskddvlt','DvLtController@TtCsKdIndex');
Route::get('ttcskddvlt/create','DvLtController@TtCsKdCreate');
Route::get('/ajax/createph/','AjaxController@createph');
Route::get('/ajax/editph','AjaxController@editph');
Route::get('/ajax/updateph','AjaxController@updateph');
Route::get('/ajax/deleteph','AjaxController@deleteph');
Route::post('ttcskddvlt','DvLtController@TtCsKdStore');
Route::get('ttcskddvlt/{id}/edit','DvLtController@TtCsKdEdit');
Route::get('/ajax/chinhsuaph/','AjaxController@chinhsuaph');
Route::get('/ajax/capnhatph/','AjaxController@capnhatph');
Route::get('/ajax/xoaph/','AjaxController@xoaph');
Route::get('/ajax/themmoiph/','AjaxController@themmoiph');
Route::patch('ttcskddvlt/{id}','DvLtController@TtCsKdUpdate');
        //End Kê khai thông tin cơ sở kinh doanh
    //End giá dịch vụ lưu trú

    //Giá dịch vụ vận tải
    //End giá dịch vụ vận tải




    //Giá dịch vụ vận tải
Route::group(['prefix'=>'dvvantai'],function(){
        //Danh sách đơn vị
    Route::resource('donvi','DonViDvVtController');
    Route::get('chkmasothue/{masothue}', 'DonViDvVtController@chkMaSoThue');
    Route::get('chkuser/{ma}', 'DonViDvVtController@chkUser');
        //End Danh sách đơn vị

        //Dịch vụ vận tải xe khách
    Route::resource('dvxekhach','DmDvVtXkController');
    Route::get('chkdvxk/{madichvu}','DmDvVtXkController@chkDvXk');
    Route::get('deldvxk/{id}','DmDvVtXkController@destroy');
    Route::resource('kkdvxk','KkDvVtXkController');
    Route::group(['prefix'=>'thaotackkdvxk'],function(){
        Route::get('delete/{id}','KkDvVtXkController@destroy');
        Route::get('chuyen/{id}','KkDvVtXkController@chuyen');
        Route::get('duyet/{ids}','KkDvVtXkController@duyet');
        Route::get('boduyet/{ids}','KkDvVtXkController@boduyet');
        Route::get('tralai/{id}','KkDvVtXkController@tralai');
    });
            //Chi tiết kê khai
    Route::get('kkdvxkct/{idkk}','KkDvVtXkCtController@index');
    Route::get('kkdvxkct/create/{idkk}/{madichvu}','KkDvVtXkCtController@create');
    Route::post('kkdvxkct/store','KkDvVtXkCtController@store');
    Route::get('kkdvxkct/{idkk}/{idgia}/edit','KkDvVtXkCtController@edit');
    Route::patch('kkdvxkct/{idkk}/{idgia}/update','KkDvVtXkCtController@update');
    Route::post('kkdvxkct/del/{idkk}','KkDvVtXkCtController@destroy');
            //Printf
    Route::get('kkdvxkct/print/{idkk}','KkDvVtXkCtController@printKK');
        //End Dịch vụ vận tải xe khách

        //Dịch vụ vận tải bằng xe buýt
    Route::group(['prefix'=>'dvxb'],function(){
            //Danh mục dịch vụ
        Route::resource('danhmuc','DmDvVtXbController');
        Route::get('deldv/{id}','DmDvVtXbController@destroy');
        Route::get('chkdv/{madichvu}','DmDvVtXbController@chkDv');
            //Kê khai dịch vụ
        Route::resource('kekhai','KkDvVtXbController');
        Route::group(['prefix'=>'thaotac'],function(){
            Route::get('delete/{id}','KkDvVtXbController@destroy');
            Route::get('chuyen/{id}','KkDvVtXbController@chuyen');
            Route::get('duyet/{ids}','KkDvVtXbController@duyet');
            Route::get('boduyet/{ids}','KkDvVtXbController@boduyet');
            Route::get('tralai/{id}','KkDvVtXbController@tralai');
        });
            //Kê khai chi tiết
        Route::group(['prefix'=>'chitiet'],function(){
            Route::get('danhsach/{idkk}','KkDvVtXbCtController@index');
            Route::get('create/{idkk}/{madichvu}','KkDvVtXbCtController@create');
            Route::post('store','KkDvVtXbCtController@store');
            Route::get('edit/{idkk}/{idgia}','KkDvVtXbCtController@edit');
            Route::patch('update/{idkk}/{idgia}','KkDvVtXbCtController@update');
            Route::post('del/{idkk}','KkDvVtXbCtController@destroy');
        });
            //In kê khai
        Route::get('print/{idkk}','KkDvVtXbCtController@printKK');
    });
        //End Dịch vụ vận tải bằng xe buýt

        //Dịch vụ vận tải bằng xe taxi
    Route::group(['prefix'=>'dvxtx'],function(){
            //Danh mục dịch vụ
        Route::resource('danhmuc','DmDvVtXtxController');
        Route::get('deldv/{id}','DmDvVtXtxController@destroy');
        Route::get('chkdv/{madichvu}','DmDvVtXtxController@chkDv');
            //Kê khai dịch vụ
        Route::resource('kekhai','KkDvVtXtxController');
        Route::group(['prefix'=>'thaotac'],function(){
            Route::get('delete/{id}','KkDvVtXtxController@destroy');
            Route::get('chuyen/{id}','KkDvVtXtxController@chuyen');
            Route::get('duyet/{ids}','KkDvVtXtxController@duyet');
            Route::get('boduyet/{ids}','KkDvVtXtxController@boduyet');
            Route::get('tralai/{id}','KkDvVtXtxController@tralai');
        });
            //Kê khai chi tiết
        Route::group(['prefix'=>'chitiet'],function(){
            Route::get('danhsach/{idkk}','KkDvVtXtxCtController@index');
            Route::get('create/{idkk}/{madichvu}','KkDvVtXtxCtController@create');
            Route::post('store','KkDvVtXtxCtController@store');
            Route::get('edit/{idkk}/{idgia}','KkDvVtXtxCtController@edit');
            Route::patch('update/{idkk}/{idgia}','KkDvVtXtxCtController@update');
            Route::post('del/{idkk}','KkDvVtXtxCtController@destroy');
        });
            //In kê khai
        Route::get('print/{idkk}','KkDvVtXtxCtController@printKK');
    });
        //Dịch vụ vận tải bằng xe taxi

        //Dịch vụ vận tải khác
    Route::group(['prefix'=>'dvkhac'],function(){
        //Danh mục dịch vụ
        Route::resource('danhmuc','DmDvVtKhacController');
        Route::get('deldv/{id}','DmDvVtKhacController@destroy');
        Route::get('chkdv/{madichvu}','DmDvVtKhacController@chkDv');
            //Kê khai dịch vụ
        Route::resource('kekhai','KkDvVtKhacController');
        Route::group(['prefix'=>'thaotac'],function(){
            Route::get('delete/{id}','KkDvVtKhacController@destroy');
            Route::get('chuyen/{id}','KkDvVtKhacController@chuyen');
            Route::get('duyet/{ids}','KkDvVtKhacController@duyet');
            Route::get('boduyet/{ids}','KkDvVtKhacController@boduyet');
            Route::get('tralai/{id}','KkDvVtKhacController@tralai');
        });
            //Kê khai chi tiết
        Route::group(['prefix'=>'chitiet'],function(){
            Route::get('danhsach/{idkk}','KkDvVtKhacCtController@index');
            Route::get('create/{idkk}/{madichvu}','KkDvVtKhacCtController@create');
            Route::post('store','KkDvVtKhacCtController@store');
            Route::get('edit/{idkk}/{idgia}','KkDvVtKhacCtController@edit');
            Route::patch('update/{idkk}/{idgia}','KkDvVtKhacCtController@update');
            Route::post('del/{idkk}','KkDvVtKhacCtController@destroy');
        });
            //In kê khai
        Route::get('print/{idkk}','KkDvVtKhacCtController@printKK');
    });
        //End Dịch vụ vận tải khác
});
    //End Giá dịch vụ vận tải

//End Quản lý

