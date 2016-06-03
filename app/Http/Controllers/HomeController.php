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

    public function index()
    {
        if (Session::has('admin')) {

            if(session('admin')->level == 'T') {
                    //Dịch vụ lưu trú
                $hsltcc = 0;
                $hsltcn = KkGDvLt::where('trangthai', 'Chờ nhận')->count();
                $hsltcd = KkGDvLt::where('trangthai','Chờ duyệt')->count();
                $hslttl = KkGDvLt::where('trangthai','Bị trả lại')->count();
                    //Dịch vụ vận tải xe khách
                $hsxkcc = 0;
                $hsxkcn = KkDvVtXk::where('trangthai','Chờ nhận')->count();
                $hsxkcd = KkDvVtXk::where('trangthai','Chờ duyệt')->count();
                $hsxktl = KkDvVtXk::where('trangthai','Bị trả lại')->count();
                    //Dịch vụ vận tải xe buýt
                $hsxbcc = 0;
                $hsxbcn = KkDvVtXb::where('trangthai','Chờ nhận')->count();
                $hsxbcd = KkDvVtXb::where('trangthai','Chờ duyệt')->count();
                $hsxbtl = KkDvVtXb::where('trangthai','Bị trả lại')->count();
                    //Dịch vụ vận tải xe taxi
                $hsxtxcc = 0;
                $hsxtxcn = KkDvVtXtx::where('trangthai','Chờ nhận')->count();
                $hsxtxcd = KkDvVtXtx::where('trangthai','Chờ duyệt')->count();
                $hsxtxtl = KkDvVtXtx::where('trangthai','Bị trả lại')->count();
                    //Dịch vụ vận tải chở hàng
                $hschcc = 0;
                $hschcn = KkDvVtKhac::where('trangthai','Chờ nhận')->count();
                $hschcd = KkDvVtKhac::where('trangthai','Chờ duyệt')->count();
                $hschtl = KkDvVtKhac::where('trangthai','Bị trả lại')->count();
            }else{
                    //Dịch vụ lưu trú
                $hsltcc = KkGDvLt::where('trangthai', 'Chờ chuyển')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
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
                $hsxkcc = KkDvVtXk::where('trangthai', 'Chờ chuyển')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
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
                $hsxbcc = KkDvVtXb::where('trangthai', 'Chờ chuyển')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
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
                $hsxtxcc = KkDvVtXtx::where('trangthai', 'Chờ chuyển')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
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
                $hschcc = KkDvVtKhac::where('trangthai', 'Chờ chuyển')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
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
                ->with('hsltcc',$hsltcc)
                ->with('hsltcn',$hsltcn)//Dịch vụ lưu trú
                ->with('hsltcd',$hsltcd)
                ->with('hslttl',$hslttl)
                ->with('hsxkcn',$hsxkcn)//Dịch vụ vận tải xe khách
                ->with('hsxkcc',$hsxkcc)
                ->with('hsxkcd',$hsxkcd)
                ->with('hsxktl',$hsxktl)
                ->with('hsxbcn',$hsxbcn)//Dịch vụ vận tải xe buýt
                ->with('hsxbcc',$hsxbcc)
                ->with('hsxbcd',$hsxbcd)
                ->with('hsxbtl',$hsxbtl)
                ->with('hsxtxcn',$hsxtxcn )//Dịch vụ vận tải xe taxi
                ->with('hsxtxcc',$hsxtxcc)
                ->with('hsxtxcd',$hsxtxcd)
                ->with('hsxtxtl',$hsxtxtl)
                ->with('hschcn',$hschcn)//Dịch vụ vận tải chở hàng
                ->with('hschcc',$hschcc)
                ->with('hschcd',$hschcd)
                ->with('hschtl',$hschtl)
                ->with('pageTitle', 'Tổng quan');
        }else
            return view('welcome');
    }

}
