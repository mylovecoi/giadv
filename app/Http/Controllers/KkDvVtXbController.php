<?php

namespace App\Http\Controllers;

use App\DonViDvVt;
use App\KkDvVtXb;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KkDvVtXbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('admin')) {

            if(session('admin')->level == 'T')
                $model = KkDvVtXb::where('trangthai','<>','Chờ chuyển')
                    ->get();
            else
                $model = KkDvVtXb::where('masothue',session('admin')->mahuyen)
                    ->get();

            $modeldonvi = DonViDvVt::all();

            foreach($model as $dn){
                $this->getTenDV($modeldonvi,$dn);
            }

            return view('quanly.dvvt.dvxb.kkdv.index')
                ->with('model',$model)
                ->with('pageTitle','Kê khai giá dịch vụ vận tải');

        }else
            return view('errors.notlogin');
    }

    public function getTenDV($atenDV,$array){
        foreach($atenDV as $tenDV){
            if($tenDV->masothue == $array->masothue)
                $array->tendonvi = $tenDV->tendonvi;
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Session::has('admin')) {
            return view('quanly.dvvt.dvxb.kkdv.create')
                ->with('pageTitle','Kê khai mới giá dịch vụ vận tải');

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
            $model = new KkDvVtXb();
            $model->ngaynhap = $insert['ngaynhap'];
            $model->socv = $insert['socv'];
            $model->ngayhieuluc = $insert['ngayhieuluc'];
            $model->nguoinop=$insert['nguoinop'];
            $model->trangthai = 'Chờ chuyển';
            $model->masothue = session('admin')->mahuyen;
            $model->ghichu = $insert['ghichu'];
            $model->save();
            return redirect('dvvantai/dvxb/kekhai');

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
            $model = KkDvVtXb::findOrFail($id);
            return view('quanly.dvvt.dvxb.kkdv.edit')
                ->with('model',$model)
                ->with('pageTitle','Chỉnh sửa kê khai giá dịch vụ vận tải');
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
            $model = KkDvVtXb::findOrFail($id);
            $model->ngaynhap = $update['ngaynhap'];
            $model->socv = $update['socv'];
            $model->ngayhieuluc = $update['ngayhieuluc'];
            $model->ghichu = $update['ghichu'];
            $model->nguoinop = $update['nguoinop'];
            $model->ngaynhan = $update['ngaynhan'];
            $model->save();
            return redirect('dvvantai/dvxb/kekhai');
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

            $model = KkDvVtXb::findOrFail($id);
            $model->delete();
            return redirect('dvvantai/dvxb/kekhai');
        }else
            return view('errors.notlogin');
    }

    public function chuyen($id){
        if (Session::has('admin')) {
            $model = KkDvVtXb::findOrFail($id);
            $model->trangthai = 'Chờ duyệt';
            $model->save();
            return redirect('dvvantai/dvxb/kekhai');
        }else
            return view('errors.notlogin');
    }

    public function duyet($ids){
        if (Session::has('admin')) {
            $arrayid = explode('-',$ids);
            foreach($arrayid as $id){
                $model = KkDvVtXb::findOrFail($id);
                $model->trangthai = 'Duyệt';
                $model->save();
            }
            return redirect('dvvantai/dvxb/kekhai');
        }else
            return view('errors.notlogin');
    }

    public function boduyet($ids){
        if (Session::has('admin')) {
            $arrayid = explode('-',$ids);
            foreach($arrayid as $id){
                $model = KkDvVtXb::findOrFail($id);
                $model->trangthai = 'Chờ duyệt';
                $model->save();
            }
            return redirect('dvvantai/dvxb/kekhai');
        }else
            return view('errors.notlogin');
    }

    public function tralai($id){
        if (Session::has('admin')) {
            $model = KkDvVtXb::findOrFail($id);
            $model->trangthai = 'Chờ chuyển';
            $model->save();
            return redirect('dvvantai/dvxb/kekhai');
        }else
            return view('errors.notlogin');
    }
}
