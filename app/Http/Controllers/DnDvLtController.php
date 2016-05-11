<?php

namespace App\Http\Controllers;

use App\DnDvLt;
use App\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DnDvLtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('admin')) {

            $model = DnDvLt::all();

            return view('system.dmdndvlt.index')
                ->with('model',$model)
                ->with('pageTitle','Danh sách doanh nghiệp cung cấp dịch vụ lưu trú');

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

            return view('system.dmdndvlt.create')
                ->with('pageTitle','Kê khai doanh nghiệp cung cấp dịch vụ lưu trú');

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
            $model = new DnDvLt();
            $model->tendn = $insert['tendoanhnghiep'];
            $model->masothue = $insert['masothue'];
            $model->diachidn = $insert['diachitruso'];
            $model->teldn = $insert['telephone'];
            $model->faxdn = $insert['fax'];
            $model->noidknopthue= $insert['dknopthue'];
            $model->chucdanhky = $insert['chucdanh'];
            $model->nguoiky = $insert['nguoiky'];
            $model->diadanh = $insert['diadanh'];
            if($model->save()){
                $modeluser = new Users();
                $modeluser->name = $insert['tendoanhnghiep'];
                $modeluser->phone = $insert['telephone'];
                $modeluser->username = $insert['username'];
                $modeluser->password = md5($insert['password']);
                $modeluser->status = 'Kích hoạt';
                $modeluser->level = 'H';
                $modeluser->mahuyen = $insert['masothue'];
                $modeluser->save();
            }
            return redirect('dndvlt');

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

            $model = DnDvLt::findOrFail($id);
            return view('system.dmdndvlt.edit')
                ->with('model',$model)
                ->with('pageTitle','Chỉnh sửa thông tin doanh nghiệp');

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

            $model = DnDvLt::findOrFail($id);
            $model->tendn = $update['tendn'];
            $model->diachidn = $update['diachidn'];
            $model->teldn = $update['teldn'];
            $model->faxdn = $update['faxdn'];
            $model->noidknopthue= $update['noidknopthue'];
            $model->chucdanhky = $update['chucdanhky'];
            $model->nguoiky = $update['nguoiky'];
            $model->diadanh = $update['diadanh'];
            $model->save();

            return redirect('dndvlt');


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


            $model = DnDvLt::findOrFail($id);
            $model->delete();

            return redirect('dndvlt');


        }else
            return view('errors.notlogin');
    }

    public function CheckMaSoThue($masothue){

        $doanhnghiep = DnDvLt::where('masothue',$masothue)->first();
        if(isset($doanhnghiep)){
            echo 'duplicate';
        }else {
            echo 'ok';
        }
    }

    public function CheckUser($user){
        $users = Users::where('username',$user)->first();
        if(isset($users)){
            echo 'duplicate';
        }else {
            echo 'ok';
        }
    }
}
