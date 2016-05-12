<?php

namespace App\Http\Controllers;

use App\DnDvVt;
use App\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DnDvVtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('admin')) {

            $model = DnDvVt::all();

            return view('system.dmdndvvt.index')
                ->with('model',$model)
                ->with('pageTitle','Danh sách doanh nghiệp cung cấp dịch vụ vận tải');

        }else
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

            return view('system.dmdndvvt.create')
                ->with('pageTitle','Kê khai doanh nghiệp cung cấp dịch vụ vận tải');

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
            $insert = $request->all();
            $model = new DnDvVt();
            $model->tendn = $insert['tendn'];
            $model->masothue = $insert['masothue'];
            $model->diachidn = $insert['diachidn'];
            $model->dienthoaidn = $insert['dienthoaidn'];
            $model->faxdn = $insert['faxdn'];
            $model->noidknopthuedn= $insert['noidknopthuedn'];
            $model->giayphepkddn = $insert['giayphepkddn'];
            $model->chucdanhky = $insert['chucdanhky'];
            $model->nguoiky = $insert['nguoiky'];
            $model->diadanh = $insert['diadanh'];
            if($model->save()){
                $modeluser = new Users();
                $modeluser->name = $insert['tendn'];
                $modeluser->phone = $insert['dienthoaidn'];
                $modeluser->username = $insert['username'];
                $modeluser->password = md5($insert['password']);
                $modeluser->status = 'Kích hoạt';
                $modeluser->level = 'H';
                $modeluser->mahuyen = $insert['masothue'];
                $modeluser->save();
            }

            return redirect('dndvvt');

        }else
            return view('errors.notlogin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            $model = DnDvVt::findOrFail($id);
            return view('system.dmdndvvt.edit')
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
            $update = $request->all();
            $model = DnDvVt::findOrFail($id);
            $model->tendn = $update['tendn'];
            $model->masothue = $update['masothue'];
            $model->diachidn = $update['diachidn'];
            $model->dienthoaidn = $update['dienthoaidn'];
            $model->faxdn = $update['faxdn'];
            $model->noidknopthuedn= $update['noidknopthuedn'];
            $model->giayphepkddn = $update['giayphepkddn'];
            $model->chucdanhky = $update['chucdanhky'];
            $model->nguoiky = $update['nguoiky'];
            $model->diadanh = $update['diadanh'];
            $model->save();

            return redirect('dndvvt');

        }else
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
            $model = DnDvVt::findOrFail($id);
            $model->delete();

            return redirect('dndvvt');

        }else
            return view('errors.notlogin');
    }

    public function CheckMaSoThue($masothue)
    {
        $donvi=DnDvVt::where('masothue',$masothue)->first();
        if($donvi){
            echo 'duplicate';
        }else{
            echo 'ok';
        }
    }

    public function CheckUser($user){
        $users = Users::where('username',$user)->first();
        if($users){
            echo 'duplicate';
        }else {
            echo 'ok';
        }
    }
}
