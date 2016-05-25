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
Route::get('/user/checkuser/{user}','UsersController@checkuser');
Route::get('/ajax/getTTdn','AjaxController@getTTdn');
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

// <editor-fold defaultstate="collapsed" desc="--Giá dịch vụ lưu trú--">

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

Route::get('xetduyetkkgdvlt/{tt}','DvLtController@index');
Route::get('xetduyetkkgdvlt/{tt}/{id}/edit','DvLtController@edit');
Route::patch('xetduyetkkgdvlt/{id}','DvLtController@update');
//Route::get('/ajax/nhanhs/','AjaxController@nhanhs');
Route::post('xetduyetkkgdvlt/nhanhs','DvLtController@nhanhs');
Route::post('xetduyetkkgdvlt/tralai','DvLtController@tralai');
Route::get('/ajax/viewlydo/','AjaxController@viewlydo');
Route::post('xetduyetkkgdvlt/duyet','DvLtController@duyet');
//End Kê khai giá dịch vụ lưu trú

//End giá dịch vụ lưu trú
// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="--Giá dịch vụ vận tải--">

Route::group(['prefix'=>'dvvantai'],function(){
    //Thông tin đơn vi
    Route::group(['prefix'=>'ttdv'],function(){
        Route::get('index', 'DonViDvVtController@TtDnIndex');
        Route::get('edit/{id}', 'DonViDvVtController@TtDnedit');
        Route::patch('update/{id}', 'DonViDvVtController@TtDnupdate');
    });
    //End Thông tin đơn vị

    //Danh sách đơn vị
    Route::resource('donvi','DonViDvVtController');
    Route::get('chkmasothue/{masothue}', 'DonViDvVtController@chkMaSoThue');
    Route::get('chkuser/{ma}', 'DonViDvVtController@chkUser');
    //End Danh sách đơn vị

    //Dịch vụ vận tải xe khách
    Route::get('dvxekhach','DmDvVtXkController@index');
    Route::get('dmdv','DmDvVtXkController@AddDM');
    //Route::get('chkdvxk/{masothue}/{madichvu}','DmDvVtXkController@chkDvXk');
    Route::get('deldvxk/{id}','DmDvVtXkController@destroy');

    Route::get('kkdvxk','KkDvVtXkController@index');
    Route::get('kkdvxk/create','KkDvVtXkController@create');
    Route::get('kkdvxk/edit/{id}','KkDvVtXkController@edit');
    Route::patch('kkdvxk/{id}/update','KkDvVtXkController@update');
    Route::patch('kkdvxk/store','KkDvVtXkController@store');
    Route::get('kkdvxk/updategiadv','KkDvVtXkController@updategiadv');
    Route::get('kkdvxk/updategiadvct','KkDvVtXkController@updategiadvct');
    Route::get('kkdvxk/nhanhs','KkDvVtXkController@nhanhs');

    Route::group(['prefix'=>'thaotackkdvxk'],function(){
        Route::get('delete/{id}','KkDvVtXkController@destroy');
        Route::get('chuyen','KkDvVtXkController@chuyen');
        Route::get('duyet/{ids}','KkDvVtXkController@duyet');
        Route::get('boduyet/{ids}','KkDvVtXkController@boduyet');
        Route::get('tralai','KkDvVtXkController@tralai');
    });
    //Chi tiết kê khai
    Route::get('kkdvxkct/{masokk}','KkDvVtXkCtController@index');
    Route::get('kkdvxkct/{id}/edit','KkDvVtXkCtController@edit');
    Route::patch('kkdvxkct/{id}/update','KkDvVtXkCtController@update');
    Route::get('kkdvxkct/del/{id}','KkDvVtXkCtController@destroy');
    //Printf
    Route::get('kkdvxkct/print/{masokk}','KkDvVtXkCtController@printKK');

        //Xét duyệt dịch vụ xe khách - giao diện sở -
    Route::get('xetduyetkkdvxk/{tt}','KkDvVtXkController@indexXD');
    Route::get('duyetkkdvxk','KkDvVtXkController@accept');
    //Route::patch('xetduyetkkgdvlt/{id}','DvLtController@update');
    //End Xét duyệt
    //End Dịch vụ vận tải xe khách

    //Dịch vụ vận tải bằng xe buýt
    Route::group(['prefix'=>'dvxb'],function(){
        //Danh mục dịch vụ
        Route::get('danhmuc','DmDvVtXbController@index');
        Route::get('dmdv','DmDvVtXbController@dmdv');
        Route::get('deldv/{id}','DmDvVtXbController@destroy');
        Route::get('chkdv/{masothue}/{madichvu}','DmDvVtXbController@chkDv');
        //Kê khai dịch vụ
        //Route::resource('kekhai','KkDvVtXbController');
        Route::group(['prefix'=>'kekhai'],function(){
            Route::get('index','KkDvVtXbController@index');
            Route::get('create','KkDvVtXbController@create');
            Route::patch('store','KkDvVtXbController@store');
            Route::get('edit/{id}','KkDvVtXbController@edit');
            Route::patch('update/{id}','KkDvVtXbController@update');
            Route::get('updategiadv','KkDvVtXbController@updategiadv');
            Route::get('updategiadvct','KkDvVtXbController@updategiadvct');
        });
        //End kê khai dịch vụ
        Route::group(['prefix'=>'thaotac'],function(){
            Route::get('delete/{id}','KkDvVtXbController@destroy');
            Route::get('chuyen','KkDvVtXbController@chuyen');
            //Route::get('duyet/{ids}','KkDvVtXbController@duyet');
            //Route::get('boduyet/{ids}','KkDvVtXbController@boduyet');
            Route::get('tralai','KkDvVtXbController@tralai');
            Route::get('nhanhs','KkDvVtXbController@nhanhs');
        });
        //Kê khai chi tiết - bỏ
        Route::group(['prefix'=>'chitiet'],function(){
            Route::get('danhsach/{masokk}','KkDvVtXbCtController@index');
            Route::get('edit/{masokk}','KkDvVtXbCtController@edit');
            Route::patch('update/{id}','KkDvVtXbCtController@update');
            Route::get('del/{id}','KkDvVtXbCtController@destroy');
        });
        //End Kê khai chi tiết - bỏ

        //In kê khai
        Route::get('print/{masokk}','KkDvVtXbCtController@printKK');

        //Xét duyệt dịch vụ xe buýt - giao diện sở -
        Route::get('xetduyet/{tt}','KkDvVtXbController@indexXD');
        Route::get('duyet','KkDvVtXbController@accept');
        //End Xét duyệt
    });
    //End Dịch vụ vận tải bằng xe buýt

    //Dịch vụ vận tải bằng xe taxi
    Route::group(['prefix'=>'dvxtx'],function(){
        //Danh mục dịch vụ
        Route::get('danhmuc','DmDvVtXtxController@index');
        Route::get('dmdv','DmDvVtXtxController@dmdv');
        Route::get('deldv/{id}','DmDvVtXtxController@destroy');
        Route::get('chkdv/{masothue}/{madichvu}','DmDvVtXtxController@chkDv');
        //Kê khai dịch vụ
        //Route::resource('kekhai','KkDvVtXtxController');
        Route::group(['prefix'=>'kekhai'],function(){
            Route::get('index','KkDvVtXtxController@index');
            Route::get('create','KkDvVtXtxController@create');
            Route::patch('store','KkDvVtXtxController@store');
            Route::get('edit/{id}','KkDvVtXtxController@edit');
            Route::patch('update/{id}','KkDvVtXtxController@update');
            Route::get('updategiadv','KkDvVtXtxController@updategiadv');
            Route::get('updategiadvct','KkDvVtXtxController@updategiadvct');
        });
        //End kê khai dịch vụ

        Route::group(['prefix'=>'thaotac'],function(){
            Route::get('delete/{id}','KkDvVtXtxController@destroy');
            Route::get('chuyen','KkDvVtXtxController@chuyen');
            //Route::get('duyet/{ids}','KkDvVtXtxController@duyet');
            //Route::get('boduyet/{ids}','KkDvVtXtxController@boduyet');
            Route::get('tralai','KkDvVtXtxController@tralai');
            Route::get('nhanhs','KkDvVtXtxController@nhanhs');
        });
        //Kê khai chi tiết
        Route::group(['prefix'=>'chitiet'],function(){
            Route::get('danhsach/{masokk}','KkDvVtXtxCtController@index');
            //Route::get('create/{idkk}/{madichvu}','KkDvVtXtxCtController@create');
            //Route::post('store','KkDvVtXtxCtController@store');
            Route::get('edit/{masokkkk}','KkDvVtXtxCtController@edit');
            Route::patch('update/{id}','KkDvVtXtxCtController@update');
            Route::get('del/{id}','KkDvVtXtxCtController@destroy');
        });
        //In kê khai
        Route::get('print/{masokk}','KkDvVtXtxCtController@printKK');

        //Xét duyệt dịch vụ xe taxi - giao diện sở -
        Route::get('xetduyet/{tt}','KkDvVtXtxController@indexXD');
        Route::get('duyet','KkDvVtXtxController@accept');
        //End Xét duyệt
    });
    //End Dịch vụ vận tải bằng xe taxi

    //Dịch vụ vận tải khác
    Route::group(['prefix'=>'dvkhac'],function(){
        //Danh mục dịch vụ
        Route::get('danhmuc','DmDvVtKhacController@index');
        Route::get('dmdv','DmDvVtKhacController@dmdv');
        Route::get('deldv/{id}','DmDvVtKhacController@destroy');
        Route::get('chkdv/{masothue}/{madichvu}','DmDvVtKhacController@chkDv');
        //Kê khai dịch vụ
        //Route::resource('kekhai','KkDvVtKhacController');
        Route::group(['prefix'=>'kekhai'],function(){
            Route::get('index','KkDvVtKhacController@index');
            Route::get('create','KkDvVtKhacController@create');
            Route::patch('store','KkDvVtKhacController@store');
            Route::get('edit/{id}','KkDvVtKhacController@edit');
            Route::patch('update/{id}','KkDvVtKhacController@update');
            Route::get('updategiadv','KkDvVtKhacController@updategiadv');
            Route::get('updategiadvct','KkDvVtKhacController@updategiadvct');
        });
        //End kê khai dịch vụ

        Route::group(['prefix'=>'thaotac'],function(){
            Route::get('delete/{id}','KkDvVtKhacController@destroy');
            Route::get('chuyen','KkDvVtKhacController@chuyen');
            Route::get('tralai','KkDvVtKhacController@tralai');
            Route::get('nhanhs','KkDvVtKhacController@nhanhs');
        });
        //Kê khai chi tiết
        Route::group(['prefix'=>'chitiet'],function(){
            Route::get('danhsach/{idkk}','KkDvVtKhacCtController@index');
            //Route::get('create/{idkk}/{madichvu}','KkDvVtKhacCtController@create');
            //Route::post('store','KkDvVtKhacCtController@store');
            Route::get('edit/{masokk}','KkDvVtKhacCtController@edit');
            Route::patch('update/{id}','KkDvVtKhacCtController@update');
            Route::get('del/{id}','KkDvVtKhacCtController@destroy');
        });
        //In kê khai
        Route::get('print/{masokk}','KkDvVtKhacCtController@printKK');

        //Xét duyệt dịch vụ chở hàng - giao diện sở -
        Route::get('xetduyet/{tt}','KkDvVtKhacController@indexXD');
        Route::get('duyet','KkDvVtKhacController@accept');
        //End Xét duyệt
    });
    //End Dịch vụ vận tải khác
});
//End Giá dịch vụ vận tải
// </editor-fold>

// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="--Báo cáo--">

Route::get('reports/dvlt', function(){
    return view('reports.kkgdvlt.bcth.index')
        ->with('pageTitle','Báo cáo tổng hợp dịch vụ lưu trú');
});
Route::post('reports/dvlt/BC1','ReportsController@dvltbc1');
Route::post('reports/dvlt/BC2','ReportsController@dvltbc2');

// </editor-fold>
