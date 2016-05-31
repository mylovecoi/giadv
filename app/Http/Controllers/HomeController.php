<?php

namespace App\Http\Controllers;

use App\DmHhTn;
use App\DmHhXnK;
use App\KkDvVtKhac;
use App\KkDvVtXb;
use App\KkDvVtXk;
use App\KkDvVtXtx;
use App\KkGDvLt;
use App\KkGDvLtCt;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\GeneralConfigs;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('admin')) {

            if(session('admin')->level == 'T') {
                    //Dịch vụ lưu trú
                $hsltcn = KkGDvLt::where('trangthai', 'Chờ nhận')->count();
                $hsltcd = KkGDvLt::where('trangthai','Chờ duyệt')->count();
                $hslttl = KkGDvLt::where('trangthai','Bị trả lại')->count();
                    //Dịch vụ vận tải xe khách
                $hsxkcn = KkDvVtXk::where('trangthai','Chờ nhận')->count();
                $hsxkcd = KkDvVtXk::where('trangthai','Chờ duyệt')->count();
                $hsxktl = KkDvVtXk::where('trangthai','Bị trả lại')->count();
                    //Dịch vụ vận tải xe buýt
                $hsxbcn = KkDvVtXb::where('trangthai','Chờ nhận')->count();
                $hsxbcd = KkDvVtXb::where('trangthai','Chờ duyệt')->count();
                $hsxbtl = KkDvVtXb::where('trangthai','Bị trả lại')->count();
                    //Dịch vụ vận tải xe taxi
                $hsxtxcn = KkDvVtXtx::where('trangthai','Chờ nhận')->count();
                $hsxtxcd = KkDvVtXtx::where('trangthai','Chờ duyệt')->count();
                $hsxtxtl = KkDvVtXtx::where('trangthai','Bị trả lại')->count();
                    //Dịch vụ vận tải chở hàng
                $hschcn = KkDvVtKhac::where('trangthai','Chờ nhận')->count();
                $hschcd = KkDvVtKhac::where('trangthai','Chờ duyệt')->count();
                $hschtl = KkDvVtKhac::where('trangthai','Bị trả lại')->count();
            }else{
                    //Dịch vụ lưu trú
                $hsltcn = KkGDvLt::where('trangthai', 'Chờ nhận')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
                $hsltcd = KkGDvLt::where('trangthai','Chờ duyệt')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
                $hslttl = KkGDvLt::where('trangthai','Bị trả lại')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
                    //Dịch vụ vận tải xe khách
                $hsxkcn = KkDvVtXk::where('trangthai', 'Chờ nhận')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
                $hsxkcd = KkDvVtXk::where('trangthai','Chờ duyệt')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
                $hsxktl = KkDvVtXk::where('trangthai','Bị trả lại')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
                    //Dịch vụ vận tải xe buýt
                $hsxbcn = KkDvVtXb::where('trangthai', 'Chờ nhận')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
                $hsxbcd = KkDvVtXb::where('trangthai','Chờ duyệt')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
                $hsxbtl = KkDvVtXb::where('trangthai','Bị trả lại')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
                    //Dịch vụ vận tải xe taxi
                $hsxtxcn = KkDvVtXtx::where('trangthai', 'Chờ nhận')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
                $hsxtxcd = KkDvVtXtx::where('trangthai','Chờ duyệt')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
                $hsxtxtl = KkDvVtXtx::where('trangthai','Bị trả lại')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
                    //Dịch vụ vận tải chở hàng
                $hschcn = KkDvVtKhac::where('trangthai', 'Chờ nhận')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
                $hschcd = KkDvVtKhac::where('trangthai','Chờ duyệt')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
                $hschtl = KkDvVtKhac::where('trangthai','Bị trả lại')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
            }


            return view('dashboard')
                ->with('hsltcn',$hsltcn)//Dịch vụ lưu trú
                ->with('hsltcd',$hsltcd)
                ->with('hslttl',$hslttl)
                ->with('hsxkcn',$hsxkcn)//Dịch vụ vận tải xe khách
                ->with('hsxkcd',$hsxkcd)
                ->with('hsxktl',$hsxktl)
                ->with('hsxbcn',$hsxbcn)//Dịch vụ vận tải xe buýt
                ->with('hsxbcd',$hsxbcd)
                ->with('hsxbtl',$hsxbtl)
                ->with('hsxtxcn',$hsxtxcn )//Dịch vụ vận tải xe taxi
                ->with('hsxtxcd',$hsxtxcd)
                ->with('hsxtxtl',$hsxtxtl)
                ->with('hschcn',$hschcn)//Dịch vụ vận tải chở hàng
                ->with('hschcd',$hschcd)
                ->with('hschtl',$hschtl)
                ->with('pageTitle', 'Tổng quan');
        }else
            return view('welcome');
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
}
