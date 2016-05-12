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
    public function index($idkk)
    {
        if (Session::has('admin')) {
            $modelkk = KkDvVtKhac::where('id', $idkk)->first();
            $modeldonvi = DonViDvVt::where('masothue', $modelkk->masothue)->first();
            $model = DmDvVtKhac::where('masothue', $modelkk->masothue)->get();
            $modelgia = KkDvVtKhacCt::where('idkk', $idkk)->get();

            foreach ($model as $gianiemyet) {
                $this->getGia($modelgia, $gianiemyet);
            }

            return view('quanly.dvvt.dvkhac.kkct.index')
                ->with('model', $model)
                ->with('modeldonvi', $modeldonvi)
                ->with('modelkk', $modelkk)
                ->with('pageTitle', 'Bảng kê khai giá dịch vụ vận tải bằng ô tô');
        } else
            return view('errors.notlogin');
    }

    public function getGia($gias, $array)
    {
        foreach ($gias as $gia) {
            if ($gia->madichvu == $array->madichvu) {
                $array->giakk = $gia->giakk;
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
            $modelkk = KkDvVtKhac::where('id', $idkk)->first();

            $modeldichvu = DmDvVtKhac::where('masothue', $modelkk->masothue)
                ->where('madichvu', $madichvu)->first();

            return view('quanly.dvvt.dvkhac.kkct.create')
                ->with('modeldichvu', $modeldichvu)
                ->with('idkk', $idkk)
                ->with('pageTitle', 'Nhập giá dịch vụ');
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
            $model = new KkDvVtKhacCt();

            $insert['giakklk'] = str_replace(',', '', $insert['giakklk']);
            $insert['giakklk'] = str_replace('.', '', $insert['giakklk']);
            $insert['giakk'] = str_replace(',', '', $insert['giakk']);
            $insert['giakk'] = str_replace('.', '', $insert['giakk']);

            $model->idkk = $insert['idkk'];
            $model->madichvu = $insert['madichvu'];
            $model->giakk = $insert['giakk'];
            $model->giakklk = $insert['giakklk'];
            $model->save();
            return redirect('dvvantai/dvkhac/chitiet/danhsach/' . $insert['idkk']);
        } else
            return view('errors.notlogin');
    }

    public function edit($idkk, $idgia)
    {
        if (Session::has('admin')) {
            $modelkk = KkDvVtKhac::where('id', $idkk)->first();

            $model = KkDvVtKhacCt::where('id', $idgia)->first();

            $modeldichvu = DmDvVtKhac::where('masothue', $modelkk->masothue)
                ->where('madichvu', $model->madichvu)->first();
            //dd($modelphong);
            return view('quanly.dvvt.dvkhac.kkct.edit')
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
            $model = KkDvVtKhacCt::where('id', $idgia)->first();
            $update['giakklk'] = str_replace(',', '', $update['giakklk']);
            $update['giakklk'] = str_replace('.', '', $update['giakklk']);
            $update['giakk'] = str_replace(',', '', $update['giakk']);
            $update['giakk'] = str_replace('.', '', $update['giakk']);

            $model->giakklk = $update['giakklk'];
            $model->giakk = $update['giakk'];
            $model->save();
            return redirect('dvvantai/dvkhac/chitiet/danhsach/' . $idkk);
            //return redirect('ctkkgdvlt/'.$idkk);
        } else
            return view('errors.notlogin');
    }

    public function destroy(Request $request, $idkk)
    {
        if (Session::has('admin')) {
            $input = $request->all();
            $model = KkDvVtKhacCt::where('id', $input['iddelete'])->first();
            $model->delete();

            return redirect('dvvantai/kkdvkhacct/' . $idkk);
        } else
            return view('errors.notlogin');
    }

    public function printKK($idkk)
    {
        if (Session::has('admin')) {
            $modelkk = KkDvVtKhac::where('id', $idkk)
                ->first();
            $modeldonvi = DonViDvVt::where('masothue', $modelkk->masothue)
                ->first();
            $modeldm = DmDvVtKhac::where('masothue', $modelkk->masothue)->get();

            $modelgia = KkDvVtKhacCt::where('idkk', $idkk)->get();

            foreach ($modeldm as $dichvu) {
                $this->getGiaDV($modelgia, $dichvu);
            }

            return view('reports.kkgdvvt.kkgdvkhac.printf')
                ->with('modeldonvi', $modeldonvi)
                ->with('modelkk', $modelkk)
                ->with('modeldm', $modeldm)
                ->with('pageTitle', 'Kê khai giá dịch vụ vận tải bằng ô tô');
        } else
            return view('errors.notlogin');
    }

    public function getGiaDV($giakk, $dichvu)
    {
        foreach ($giakk as $gia) {
            if ($gia->madichvu == $dichvu->madichvu) {
                $dichvu->giakklk = $gia->giakklk;
                $dichvu->giakk = $gia->giakk;
            }
        }
    }

}
