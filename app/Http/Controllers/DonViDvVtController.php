<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DonViDvVt;
use App\Users;
use Illuminate\Support\Facades\Session;

class DonViDvVtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('admin')){
            $model = DonViDvVt::all();
            return view('system.donvidvvt.index')
                ->with('model',$model)
                ->with('pageTitle','Danh sách đơn vị kê khai dịch vụ vận tải');
        }else
            return view('errors.notlogin');
    }

    public function TtDnIndex(){
        if (Session::has('admin')) {

            $model = DonViDvVt::where('masothue',session('admin')->mahuyen)
                ->first();
    //dd($model);
            return view('quanly.dvvt.ttdn.index')
                ->with('model',$model)
                ->with('pageTitle','Thông tin doanh nghiệp cung cấp dịch vụ lưu trú');

        }else
            return view('errors.notlogin');
    }

    public function TtDnedit($id)
    {
        if (Session::has('admin')) {
            $model = DonViDvVt::findOrFail($id);

            return view('quanly.dvvt.ttdn.edit')
                ->with('model',$model)
                ->with('pageTitle','Chỉnh sửa thông tin doanh nghiệp cung cấp dịch vụ vận tải');
        }else
            return view('errors.notlogin');
    }

    public function TtDnupdate(Request $request, $id)
    {
        if (Session::has('admin')) {
            $upd = $request->all();
            $model = DonViDvVt::findOrFail($id);
            $model->diachi = $upd['diachi'];
            $model->dienthoai = $upd['dienthoai'];
            $model->fax = $upd['fax'];
            $model->dknopthue = $upd['dknopthue'];
            $model->giayphepkd = $upd['giayphepkd'];
            $model->chucdanh = $upd['chucdanh'];
            $model->nguoiky = $upd['nguoiky'];
            $model->diadanh = $upd['diadanh'];
            //$model->dvxk = isset($upd['dvxk']) ? 1 : 0;
            //$model->dvxb = isset($upd['dvxb']) ? 1 : 0;
            //$model->dvxtx = isset($upd['dvxtx']) ? 1 : 0;
            //$model->dvk = isset($upd['dvk']) ? 1 : 0;
            $model->save();
            return redirect('dvvantai/ttdv/index');
        } else
            return view('errors.notlogin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Session::has('admin')) {

            return view('system.donvidvvt.create')
                ->with('pageTitle','Thêm mới đơn vị');
        }else
            return view('errors.notlogin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Session::has('admin')) {
            $insert = $request-> all();
            $model = new DonViDvVt();
            $model->tendonvi = $insert['tendonvi'];
            $model->masothue = $insert['masothue'];
            $model->diachi = $insert['diachi'];
            $model->dienthoai = $insert['dienthoai'];
            $model->fax = $insert['fax'];
            $model->dknopthue= $insert['dknopthue'];
            $model->giayphepkd = $insert['giayphepkd'];
            $model->chucdanh = $insert['chucdanh'];
            $model->nguoiky = $insert['nguoiky'];
            $model->diadanh = $insert['diadanh'];
            $model->dvxk = isset($insert['dvxk']) ? 1 : 0;
            $model->dvxb = isset($insert['dvxb']) ? 1 : 0;
            $model->dvxtx = isset($insert['dvxtx']) ? 1 : 0;
            $model->dvk = isset($insert['dvk']) ? 1 : 0;
            if($model->save()){
                $modeluser = new Users();
                $modeluser->name = $insert['tendonvi'];
                $modeluser->phone = $insert['dienthoai'];
                $modeluser->username = $insert['username'];
                $modeluser->password = md5($insert['password']);
                $modeluser->status = 'Kích hoạt';
                $modeluser->level = 'H';
                $modeluser->mahuyen = $insert['masothue'];
                $modeluser->pldv = 'DVVT';
                $modeluser->save();
            }
            return redirect('dvvantai/donvi');
        }else
            return view('errors.notlogin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Session::has('admin')) {
            $model = DonViDvVt::findOrFail($id);

            return view('system.donvidvvt.edit')
                ->with('model',$model)
                ->with('pageTitle','Chỉnh sửa thông tin doanh nghiệp cung cấp dịch vụ vận tải');
        }else
            return view('errors.notlogin');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Session::has('admin')) {
            $upd = $request->all();
            $model = DonViDvVt::findOrFail($id);
            $model->tendonvi = $upd['tendonvi'];
            $model->masothue = $upd['masothue'];
            $model->diachi = $upd['diachi'];
            $model->dienthoai = $upd['dienthoai'];
            $model->fax = $upd['fax'];
            $model->giayphepkd = $upd['giayphepkd'];
            $model->dknopthue = $upd['dknopthue'];
            $model->chucdanh = $upd['chucdanh'];
            $model->nguoiky = $upd['nguoiky'];
            $model->diadanh = $upd['diadanh'];
            $model->dvxk = isset($upd['dvxk']) ? 1 : 0;
            $model->dvxb = isset($upd['dvxb']) ? 1 : 0;
            $model->dvxtx = isset($upd['dvxtx']) ? 1 : 0;
            $model->dvk = isset($upd['dvk']) ? 1 : 0;
            $model->save();
            return redirect('dvvantai/donvi');
        } else
            return view('errors.notlogin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Session::has('admin')) {
            $model = DonViDvVt::findOrFail($id);
            $model->delete();
            return redirect('dvvantai/donvi');
        }else
            return view('errors.notlogin');
    }

    public function chkMaSoThue($masothue)
    {
        $donvi=DonViDvVt::where('masothue',$masothue)->first();
        if($donvi){
            echo 'duplicate';
        }else{
            echo 'ok';
        }
    }

    public function chkUser($ma){
        $users = Users::where('username',$ma)->first();
        if($users){
            echo 'duplicate';
        }else {
            echo 'ok';
        }
    }
}
