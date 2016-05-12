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
    public function index($idkk)
    {
        if (Session::has('admin')) {
            $modelkk = KkDvVtXtx::where('id', $idkk)->first();
            $modeldonvi = DonViDvVt::where('masothue', $modelkk->masothue)->first();
            $model = DmDvVtXtx::where('masothue', $modelkk->masothue)->get();
            $modelgia = KkDvVtXtxCt::where('idkk', $idkk)->get();

            foreach ($model as $gianiemyet) {
                $this->getGia($modelgia, $gianiemyet);
            }

            return view('quanly.dvvt.dvxtx.kkct.index')
                ->with('model', $model)
                ->with('modeldonvi', $modeldonvi)
                ->with('modelkk', $modelkk)
                ->with('pageTitle', 'Bảng kê khai giá dịch vụ vận tải');
        } else
            return view('errors.notlogin');
    }

    public function getGia($gias, $array)
    {
        foreach ($gias as $gia) {
            if ($gia->madichvu == $array->madichvu) {
                $array->giakk= $gia->giakk;
                $array->giakklk = $gia->giakklk;
                $array->idgia = $gia->id;
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idkk, $madichvu)
    {
        if (Session::has('admin')) {
            $modelkk = KkDvVtXtx::where('id', $idkk)->first();

            $modeldichvu = DmDvVtXtx::where('masothue', $modelkk->masothue)
                ->where('madichvu', $madichvu)->first();

            return view('quanly.dvvt.dvxtx.kkct.create')
                ->with('modeldichvu', $modeldichvu)
                ->with('idkk', $idkk)
                ->with('pageTitle', 'Nhập giá dịch vụ vận tải');
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

    public function edit($idkk, $idgia)
    {
        if (Session::has('admin')) {
            $modelkk = KkDvVtXtx::where('id', $idkk)->first();

            $model = KkDvVtXtxCt::where('id', $idgia)->first();

            $modeldichvu = DmDvVtXtx::where('masothue', $modelkk->masothue)
                ->where('madichvu', $model->madichvu)->first();
            //dd($modelphong);
            return view('quanly.dvvt.dvxtx.kkct.edit')
                ->with('modeldichvu', $modeldichvu)
                ->with('model', $model)
                ->with('idkk', $idkk)
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
    public function update(Request $request, $idkk, $idgia)
    {
        if (Session::has('admin')) {
            $update = $request->all();
            $model = KkDvVtXtxCt::where('id', $idgia)->first();
            //Số tiền lượt
            $update['giakklk'] = str_replace(',', '', $update['giakklk']);
            $update['giakklk'] = str_replace('.', '', $update['giakklk']);
            $update['giakk'] = str_replace(',', '', $update['giakk']);
            $update['giakk'] = str_replace('.', '', $update['giakk']);

            $model->giakklk = $update['giakklk'];
            $model->giakk = $update['giakk'];
            $model->save();
            return redirect('dvvantai/dvxtx/chitiet/danhsach/' . $idkk);
            //return redirect('ctkkgdvlt/'.$idkk);
        } else
            return view('errors.notlogin');
    }

    public function destroy(Request $request, $idkk)
    {
        if (Session::has('admin')) {
            $input = $request->all();
            $model = KkDvVtXtxCt::where('id', $input['iddelete'])->first();
            $model->delete();

            return redirect('dvvantai/dvxtx/chitiet/danhsach/' . $idkk);
        } else
            return view('errors.notlogin');
    }

    public function printKK($idkk)
    {
        if (Session::has('admin')) {
            $modelkk = KkDvVtXtx::where('id', $idkk)
                ->first();
            $modeldonvi = DonViDvVt::where('masothue', $modelkk->masothue)
                ->first();
            $modeldm = DmDvVtXtx::where('masothue', $modelkk->masothue)->get();

            $modelgia = KkDvVtXtxCt::where('idkk', $idkk)->get();

            foreach ($modeldm as $dichvu) {
                $this->getGia($modelgia, $dichvu);
            }

            return view('reports.kkgdvvt.kkgdvxtx.printf')
                ->with('modeldonvi', $modeldonvi)
                ->with('modelkk', $modelkk)
                ->with('modeldm', $modeldm)
                ->with('pageTitle', 'Kê khai giá dịch vụ vận tải');
        } else
            return view('errors.notlogin');
    }
}