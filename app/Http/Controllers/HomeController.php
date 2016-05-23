<?php

namespace App\Http\Controllers;

use App\DmHhTn;
use App\DmHhXnK;
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
                $hsltcn = KkGDvLt::where('trangthai', 'Chờ nhận')->count();
                $hsltcd = KkGDvLt::where('trangthai','Chờ duyệt')->count();

            }else{
                $hsltcn = KkGDvLt::where('trangthai', 'Chờ nhận')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
                $hsltcd = KkGDvLt::where('trangthai','Chờ duyệt')
                    ->where('masothue',session('admin')->mahuyen)
                    ->count();
            }


            return view('dashboard')
                ->with('hsltcn',$hsltcn)
                ->with('hsltcd',$hsltcd)
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
