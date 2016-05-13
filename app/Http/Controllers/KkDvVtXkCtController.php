<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\KkDvVtXkCt;
use App\KkDvVtXk;
use App\DonViDvVt;
use App\DmDvVtXk;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class KkDvVtXkCtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($masokk)
    {
        if (Session::has('admin')) {
            $modelkk = KkDvVtXk::where('masokk', $masokk)->first();
            $modeldonvi = DonViDvVt::where('masothue', $modelkk->masothue)->select('tendonvi')->first();
            $model = KkDvVtXkCt::where('masokk', $masokk)->get();
            if(count($model)==0) {
                $modeldv = DmDvVtXk::where('masothue', $modelkk->masothue)->get();
                foreach($modeldv as $dv){
                    $giadv=new KkDvVtXkCt();
                    $giadv->masokk=$masokk;
                    $giadv->madichvu=$dv['madichvu'];
                    $giadv->tendichvu=$dv['tendichvu'];
                    $giadv->qccl=$dv['qccl'];
                    $giadv->dvt=$dv['dvt'];
                    $giadv->save();
                }
                $model = KkDvVtXkCt::where('masokk', $masokk)->get();
            }

            return view('quanly.dvvt.dvxk.kkct.index')
                ->with('masokk', $masokk)
                ->with('modelkk', $modelkk)
                ->with('model', $model)
                ->with('tendonvi', $modeldonvi->tendonvi)
                ->with('pageTitle', 'Bảng kê khai giá dịch vụ vận tải bằng ô tô');
        } else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if (Session::has('admin')) {
            $model = KkDvVtXkCt::where('id', $id)->first();
            return view('quanly.dvvt.dvxk.kkct.edit')
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
            $model = KkDvVtXkCt::where('id', $id)->first();
            $update['giakklk'] = str_replace(',', '', $update['giakklk']);
            $update['giakklk'] = str_replace('.', '', $update['giakklk']);
            $update['giakk'] = str_replace(',', '', $update['giakk']);
            $update['giakk'] = str_replace('.', '', $update['giakk']);
            $update['giahl'] = str_replace(',', '', $update['giahl']);
            $update['giahl'] = str_replace('.', '', $update['giahl']);

            $model->tendichvu = $update['tendichvu'];
            $model->qccl = $update['qccl'];
            $model->dvt = $update['dvt'];
            $model->giakklk = $update['giakklk'];
            $model->giakk = $update['giakk'];
            $model->giahl = $update['giahl'];
            $model->thuevat = $update['thuevat'];
            $model->save();
            return redirect('dvvantai/kkdvxkct/' . $model->masokk);
        } else
            return view('errors.notlogin');
    }

    public function destroy($id)
    {
        if (Session::has('admin')) {
            $model = KkDvVtXkCt::where('id',$id)->first();

            $masokk = $model->masokk;

            $model->delete();

            return redirect('dvvantai/kkdvxkct/' . $masokk);
        } else
            return view('errors.notlogin');
    }

    public function printKK($masokk)
    {
        if (Session::has('admin')) {
            $modelkk = KkDvVtXk::where('masokk', $masokk)
                ->first();
            $modeldonvi = DonViDvVt::where('masothue', $modelkk->masothue)
                ->first();
            $modeldm = DmDvVtXk::where('masothue', $modelkk->masothue)->get();

            $modelgia = KkDvVtXkCt::where('masokk', $masokk)->get();


            return view('reports.kkgdvvt.kkgdvxk.printf')
                ->with('modeldonvi', $modeldonvi)
                ->with('modelkk', $modelkk)
                ->with('modelgia', $modelgia)
                ->with('modeldm', $modeldm)
                ->with('pageTitle', 'Kê khai giá dịch vụ vận tải bằng ô tô');
        } else
            return view('errors.notlogin');
    }

}
