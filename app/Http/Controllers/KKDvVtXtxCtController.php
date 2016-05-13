<?php

namespace App\Http\Controllers;

use App\DmDvVtXtx;
use App\DonViDvVt;
use App\KkDvVtXtx;
use App\KkDvVtXtxCt;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KKDvVtXtxCtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($masokk)
    {
        if (Session::has('admin')) {
            $modelkk = KkDvVtXtx::where('masokk', $masokk)->first();
            $modeldonvi = DonViDvVt::where('masothue', $modelkk->masothue)->select('tendonvi')->first();

            $model = KkDvVtXtxCt::where('masokk', $masokk)->get();
            if(count($model)==0) {
                $modeldv = DmDvVtXtx::where('masothue', $modelkk->masothue)->get();
                foreach($modeldv as $dv){
                    $giadv=new KkDvVtXtxCt();
                    $giadv->masokk=$masokk;
                    $giadv->madichvu=$dv['madichvu'];
                    $giadv->tendichvu=$dv['tendichvu'];
                    $giadv->qccl=$dv['qccl'];
                    $giadv->dvt=$dv['dvt'];
                    $giadv->save();
                }
                $model = KkDvVtXtxCt::where('masokk', $masokk)->get();
            }

            return view('quanly.dvvt.dvxtx.kkct.index')
                ->with('masokk', $masokk)
                ->with('modelkk', $modelkk)
                ->with('model', $model)
                ->with('tendonvi', $modeldonvi->tendonvi)
                ->with('pageTitle', 'Bảng kê khai giá dịch vụ vận tải');
        } else
            return view('errors.notlogin');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Bỏ
        if (Session::has('admin')) {
            $insert = $request->all();
            $model = new KkDvVtXtxCt();
            //Số tiền lượt
            $insert['giakklk'] = str_replace(',', '', $insert['giakklk']);
            $insert['giakklk'] = str_replace('.', '', $insert['giakklk']);
            $insert['giakk'] = str_replace(',', '', $insert['giakk']);
            $insert['giakk'] = str_replace('.', '', $insert['giakk']);

            $model->idkk = $insert['idkk'];
            $model->madichvu = $insert['madichvu'];
            $model->giakk = $insert['giakk'];
            $model->giakklk = $insert['giakklk'];
            $model->save();
            return redirect('dvvantai/dvxtx/chitiet/danhsach/' . $insert['idkk']);
        } else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if (Session::has('admin')) {
            $model = KkDvVtXtxCt::where('id', $id)->first();
            return view('quanly.dvvt.dvxtx.kkct.edit')
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

            $model = KkDvVtXtxCt::where('id', $id)->first();
            $model->giakklk = $update['giakklk'];
            $model->giakk = $update['giakk'];
            $model->tendichvu = $update['tendichvu'];
            $model->qccl = $update['qccl'];
            $model->dvt = $update['dvt'];
            $model->thuevat = $update['thuevat'];
            $model->save();
            return redirect('dvvantai/dvxtx/chitiet/danhsach/' . $model->masokk);
            //return redirect('ctkkgdvlt/'.$idkk);
        } else
            return view('errors.notlogin');
    }

    public function destroy($id)
    {
        if (Session::has('admin')) {
            $model = KkDvVtXtxCt::where('id', $id)->first();
            $masokk = $model->masokk;
            $model->delete();

            return redirect('dvvantai/dvxtx/chitiet/danhsach/' . $masokk);
        } else
            return view('errors.notlogin');
    }

    public function printKK($masokk)
    {
        if (Session::has('admin')) {
            $modelkk = KkDvVtXtx::where('masokk', $masokk)->first();
            $modeldonvi = DonViDvVt::where('masothue', $modelkk->masothue)->first();
            $modelgia = KkDvVtXtxCt::where('masokk', $masokk)->get();

            return view('reports.kkgdvvt.kkgdvxtx.printf')
                ->with('modeldonvi', $modeldonvi)
                ->with('modelkk', $modelkk)
                ->with('modelgia', $modelgia)
                ->with('pageTitle', 'Kê khai giá dịch vụ vận tải');
        } else
            return view('errors.notlogin');
    }
}