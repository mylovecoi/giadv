<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\KkDvVtKhacCt;
use App\KkDvVtKhac;
use App\DonViDvVt;
use App\DmDvVtKhac;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class KkDvVtKhacCtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($masokk)
    {
        if (Session::has('admin')) {
            $modelkk = KkDvVtKhac::where('masokk', $masokk)->first();
            $modeldonvi = DonViDvVt::where('masothue', $modelkk->masothue)->select('tendonvi')->first();

            $model = KkDvVtKhacCt::where('masokk', $masokk)->get();
            if(count($model)==0) {
                $modeldv = DmDvVtKhac::where('masothue', $modelkk->masothue)->get();
                foreach($modeldv as $dv){
                    $giadv=new KkDvVtKhacCt();
                    $giadv->masokk=$masokk;
                    $giadv->madichvu=$dv['madichvu'];
                    $giadv->tendichvu=$dv['tendichvu'];
                    $giadv->qccl=$dv['qccl'];
                    $giadv->dvt=$dv['dvt'];
                    $giadv->save();
                }
                $model = KkDvVtKhacCt::where('masokk', $masokk)->get();
            }

            return view('quanly.dvvt.dvkhac.kkct.index')
                ->with('model', $model)
                ->with('tendonvi', $modeldonvi->tendonvi)
                ->with('modelkk', $modelkk)
                ->with('masokk', $masokk)
                ->with('pageTitle', 'Bảng kê khai giá dịch vụ vận tải bằng ô tô');
        } else
            return view('errors.notlogin');
    }


    public function edit($id)
    {
        if (Session::has('admin')) {
            $model = KkDvVtKhacCt::where('id', $id)->first();
            return view('quanly.dvvt.dvkhac.kkct.edit')
                ->with('model', $model)
                ->with('id', $id)
                ->with('pageTitle', 'Cập nhật giá dịch vụ');
        } else
            return view('errors.notlogin');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Session::has('admin')) {
            $update = $request->all();
            $update['giakklk'] = str_replace(',', '', $update['giakklk']);
            $update['giakklk'] = str_replace('.', '', $update['giakklk']);
            $update['giakk'] = str_replace(',', '', $update['giakk']);
            $update['giakk'] = str_replace('.', '', $update['giakk']);

            $model = KkDvVtKhacCt::where('id', $id)->first();
            $model->tendichvu = $update['tendichvu'];
            $model->qccl = $update['qccl'];
            $model->dvt = $update['dvt'];
            $model->thuevat = $update['thuevat'];
            $model->giakklk = $update['giakklk'];
            $model->giakk = $update['giakk'];


            $model->save();
            return redirect('dvvantai/dvkhac/chitiet/danhsach/' . $model->masokk);
        } else
            return view('errors.notlogin');
    }

    public function destroy($id)
    {
        if (Session::has('admin')) {
            $model = KkDvVtKhacCt::where('id', $id)->first();
            $masokk = $model->masokk;
            $model->delete();

            return redirect('dvvantai/dvkhac/chitiet/danhsach/' . $masokk);
        } else
            return view('errors.notlogin');
    }

    public function printKK($masokk)
    {
        if (Session::has('admin')) {
            $modelkk = KkDvVtKhac::where('masokk', $masokk)->first();
            $modeldonvi = DonViDvVt::where('masothue', $modelkk->masothue)->first();
            $modelgia = KkDvVtKhacCt::where('masokk', $masokk)->get();

            return view('reports.kkgdvvt.kkgdvkhac.printf')
                ->with('modeldonvi', $modeldonvi)
                ->with('modelkk', $modelkk)
                ->with('modelgia', $modelgia)
                ->with('pageTitle', 'Kê khai giá dịch vụ vận tải bằng ô tô');
        } else
            return view('errors.notlogin');
    }

}
