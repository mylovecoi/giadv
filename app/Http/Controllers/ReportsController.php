<?php

namespace App\Http\Controllers;

use App\CsKdDvLt;
use App\DnDvLt;
use App\KkGDvLt;
use App\KkGDvLtCt;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kkgdv($id){
        if (Session::has('admin')) {

            $modelkk = KkGDvLt::findOrFail($id);
            $modeldn = DnDvLt::where('masothue',$modelkk->masothue)
                ->first();
            $modelcskd = CsKdDvLt::where('macskd',$modelkk->macskd)
                ->first();
            $modelkkct = KkGDvLtCt::where('mahs',$modelkk->mahs)
                ->get();

            return view('reports.kkgdvlt.print')
                ->with('modelkk',$modelkk)
                ->with('modeldn',$modeldn)
                ->with('modelcskd',$modelcskd)
                ->with('modelkkct',$modelkkct)
                ->with('pageTitle','Kê khai giá dịch vụ lưu trú');

        }else
            return view('errors.notlogin');
    }

    public function dvltbc1(Request $request){
        if (Session::has('admin')) {


            return view('reports.kkgdvlt.bcth.BC1')

                ->with('pageTitle','Báo cáo thống kê các đơn vị kê khai giá trong khoảng thời gian');

        }else
            return view('errors.notlogin');
    }

}
