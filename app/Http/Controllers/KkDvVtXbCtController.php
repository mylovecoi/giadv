<?php

namespace App\Http\Controllers;

use App\DmDvVtXb;
use App\DonViDvVt;
use App\KkDvVtXb;
use App\KkDvVtXbCt;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KkDvVtXbCtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idkk)
    {
        if (Session::has('admin')) {
            $modelkk = KkDvVtXb::where('id', $idkk)->first();
            $modeldonvi = DonViDvVt::where('masothue', $modelkk->masothue)->first();
            $model = DmDvVtXb::where('masothue', $modelkk->masothue)->get();
            $modelgia = KkDvVtXbCt::where('idkk', $idkk)->get();

            foreach ($model as $gianiemyet) {
                $this->getGia($modelgia, $gianiemyet);
            }

            return view('quanly.dvvt.dvxb.kkct.index')
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
                $array->giakkluot = $gia->giakkluot;
                $array->giakklkluot = $gia->giakklkluot;
                $array->giakkthang = $gia->giakkthang;
                $array->giakklkthang = $gia->giakklkthang;
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
            $modelkk = KkDvVtXb::where('id', $idkk)->first();

            $modeldichvu = DmDvVtXb::where('masothue', $modelkk->masothue)
                ->where('madichvu', $madichvu)->first();

            return view('quanly.dvvt.dvxb.kkct.create')
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
            $model = new KkDvVtXbCt();
            //Số tiền lượt
            $insert['giakklkluot'] = str_replace(',', '', $insert['giakklkluot']);
            $insert['giakklkluot'] = str_replace('.', '', $insert['giakklkluot']);
            $insert['giakkluot'] = str_replace(',', '', $insert['giakkluot']);
            $insert['giakkluot'] = str_replace('.', '', $insert['giakkluot']);
            //Số tiền tháng
            $insert['giakklkthang'] = str_replace(',', '', $insert['giakklkthang']);
            $insert['giakklkthang'] = str_replace('.', '', $insert['giakklkthang']);
            $insert['giakkthang'] = str_replace(',', '', $insert['giakkthang']);
            $insert['giakkthang'] = str_replace('.', '', $insert['giakkthang']);

            $model->idkk = $insert['idkk'];
            $model->madichvu = $insert['madichvu'];
            $model->giakkluot = $insert['giakkluot'];
            $model->giakklkluot = $insert['giakklkluot'];
            $model->giakkthang = $insert['giakkthang'];
            $model->giakklkthang = $insert['giakklkthang'];
            $model->save();
            return redirect('dvvantai/dvxb/chitiet/danhsach/' . $insert['idkk']);
        } else
            return view('errors.notlogin');
    }

    public function edit($idkk, $idgia)
    {
        if (Session::has('admin')) {
            $modelkk = KkDvVtXb::where('id', $idkk)->first();

            $model = KkDvVtXbCt::where('id', $idgia)->first();

            $modeldichvu = DmDvVtXb::where('masothue', $modelkk->masothue)
                ->where('madichvu', $model->madichvu)->first();
            //dd($modelphong);
            return view('quanly.dvvt.dvxb.kkct.edit')
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
            $model = KkDvVtXbCt::where('id', $idgia)->first();
            //Số tiền lượt
            $update['giakklkluot'] = str_replace(',', '', $update['giakklkluot']);
            $update['giakklkluot'] = str_replace('.', '', $update['giakklkluot']);
            $update['giakkluot'] = str_replace(',', '', $update['giakkluot']);
            $update['giakkluot'] = str_replace('.', '', $update['giakkluot']);
            //Số tiền tháng
            $update['giakklkthang'] = str_replace(',', '', $update['giakklkthang']);
            $update['giakklkthang'] = str_replace('.', '', $update['giakklkthang']);
            $update['giakkthang'] = str_replace(',', '', $update['giakkthang']);
            $update['giakkthang'] = str_replace('.', '', $update['giakkthang']);

            $model->giakklkluot = $update['giakklkluot'];
            $model->giakkluot = $update['giakkluot'];
            $model->giakklkthang = $update['giakklkthang'];
            $model->giakkthang = $update['giakkthang'];
            $model->save();
            return redirect('dvvantai/dvxb/chitiet/danhsach/' . $idkk);
            //return redirect('ctkkgdvlt/'.$idkk);
        } else
            return view('errors.notlogin');
    }

    public function destroy(Request $request, $idkk)
    {
        if (Session::has('admin')) {
            $input = $request->all();
            $model = KkDvVtXbCt::where('id', $input['iddelete'])->first();
            $model->delete();

            return redirect('dvvantai/dvxb/chitiet/danhsach/' . $idkk);
        } else
            return view('errors.notlogin');
    }

    public function printKK($idkk)
    {
        if (Session::has('admin')) {
            $modelkk = KkDvVtXb::where('id', $idkk)
                ->first();
            $modeldonvi = DonViDvVt::where('masothue', $modelkk->masothue)
                ->first();
            $modeldm = DmDvVtXb::where('masothue', $modelkk->masothue)->get();

            $modelgia = KkDvVtXbCt::where('idkk', $idkk)->get();

            foreach ($modeldm as $dichvu) {
                $this->getGia($modelgia, $dichvu);
            }

            return view('reports.kkgdvvt.kkgdvxb.printf')
                ->with('modeldonvi', $modeldonvi)
                ->with('modelkk', $modelkk)
                ->with('modeldm', $modeldm)
                ->with('pageTitle', 'Kê khai giá dịch vụ vận tải');
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