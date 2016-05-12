<?php

namespace App\Http\Controllers;

use App\CsKdDvLt;
use App\DnDvLt;
use App\TtCsKdDvLt;
use App\TtPhong;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DvLtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
//Thông tin doanh nghiệp- Cho doanh nghiệp tự cập nhật được thông tin của mình
    public function TtDnIndex(){
        if (Session::has('admin')) {

            $model = DnDvLt::where('masothue',session('admin')->mahuyen)
                ->first();

            return view('quanly.dvlt.ttdn.index')
                ->with('model',$model)
                ->with('pageTitle','Thông tin doanh nghiệp cung cấp dịch vụ lưu trú');

        }else
            return view('errors.notlogin');
    }

    public function TtDnEdit($id){
        if (Session::has('admin')) {

            $model = DnDvLt::findOrFail($id);

            return view('quanly.dvlt.ttdn.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tin doanh nghiệp cung cấp dịch vụ lưu trú');

        }else
            return view('errors.notlogin');
    }

    public function TtDnUpdate(Request $request,$id){
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

            return redirect('ttdndvlt');

        }else
            return view('errors.notlogin');
    }
    //End Thông tin doanh nghiệp

//Thông tin cơ sở kinh doanh - 1 doanh nghiệp có thể có nhiều cơ sở kinh doanh
    public function TtCsKdIndex(){
        if (Session::has('admin')) {
            $modeldn = DnDvLt::where('masothue',session('admin')->mahuyen)
                ->first();
            $model = CsKdDvLt::where('masothue',session('admin')->mahuyen)
                ->get();

            return view('quanly.dvlt.ttcskd.index')
                ->with('modeldn',$modeldn)
                ->with('model',$model)
                ->with('pageTitle','Thông tin cơ sở kinh doanh cung cấp dịch vụ lưu trú');

        }else
            return view('errors.notlogin');
    }

    public function TtCsKdCreate(){
        if (Session::has('admin')) {
            $model = TtPhong::where('masothue',session('admin')->mahuyen)
                ->delete();
            return view('quanly.dvlt.ttcskd.create')
                ->with('pageTitle','Kê khai thông tin cơ sở kinh doanh cung cấp dịch vụ lưu trú');

        }else
            return view('errors.notlogin');
    }

    public function TtCsKdStore(Request $request){
        if (Session::has('admin')) {
            $now = getdate();
            $ma = session('admin')->mahuyen.'-'.$now['mday'].$now['mon'].$now['year'].$now['hours'].$now['minutes'].$now['seconds'];
            $insert = $request->all();

            $model = new CsKdDvLt();
            $model->macskd = $ma;
            $model->masothue = session('admin')->mahuyen;
            $model->tencskd = $insert['tencosokinhdoanh'];
            $model->loaihang = $insert['loaihang'];
            $model->diachikd = $insert['diachikinhdoanh'];
            $model->telkd = $insert['telephonekinhdoanh'];
            if($model->save())
                $this->StorePh($ma);

            return redirect('ttcskddvlt');
        }else
            return view('errors.notlogin');
    }

    public function StorePh($ma){
        $modelph = TtPhong::where('masothue',session('admin')->mahuyen)
            ->get();
        foreach($modelph as $ph){
            $model = new TtCsKdDvLt();
            $model->maloaip = $ph->maloaip;
            $model->loaip = $ph->loaip;
            $model->qccl = $ph->qccl;
            $model->sohieu = $ph->sohieu;
            $model->ghichu = $ph->ghichu;
            $model->macskd = $ma;
            $model->save();
        }
    }

    public function TtCsKdEdit($id){
        if (Session::has('admin')) {
            $model = CsKdDvLt::findOrFail($id);
            $modelph = TtCsKdDvLt::where('macskd',$model->macskd)
                ->get();

            return view('quanly.dvlt.ttcskd.edit')
                ->with('model',$model)
                ->with('modelph',$modelph)
                ->with('pageTitle','Chỉnh sửa thông tin cơ sở kinh doanh dịch vụ lưu trú');
        }else
            return view('errors.notlogin');
    }

    public function TtCsKdUpdate(Request $request, $id){
        if (Session::has('admin')) {
            $update = $request->all();
            $model = CsKdDvLt::findOrFail($id);
            $model->tencskd = $update['tencskd'];
            $model->loaihang = $update['loaihang'];
            $model->diachikd = $update['diachikd'];
            $model->telkd = $update['telkd'];
            $model->save();

            return redirect('ttcskddvlt');
        }else
            return view('errors.notlogin');
    }

//End Thông tin cơ sở kinh doanh
}
