<?php

namespace App\Http\Controllers;

use App\CbKkDvVtXb;
use App\DmDvVtXb;
use App\DonViDvVt;
use App\KkDvVtXb;
use App\KkDvVtXbCtDf;
use App\KkDvVtXbCt;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KkDvVtXbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('admin')) {

            if(session('admin')->level == 'T')
                $model = KkDvVtXb::where('trangthai','<>','Chờ chuyển')
                    ->where('trangthai','<>','Bị trả lại')
                    ->orderBy('ngaynhap', 'esc')
                    ->get();
            else
                $model = KkDvVtXb::where('masothue',session('admin')->mahuyen)
                    ->orderBy('ngaynhap', 'esc')
                    ->get();

            /*
            $modeldonvi = DonViDvVt::all();
            foreach($model as $dn){
                $this->getTenDV($modeldonvi,$dn);
            }
            */

            return view('quanly.dvvt.dvxb.kkdv.index')
                ->with('model',$model)
                ->with('pageTitle','Kê khai giá dịch vụ vận tải');

        }else
            return view('errors.notlogin');
    }

    public function getTenDV($atenDV,$array){
        foreach($atenDV as $tenDV){
            if($tenDV->masothue == $array->masothue)
                $array->tendonvi = $tenDV->tendonvi;
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Session::has('admin')) {
            $masothue=session('admin')->mahuyen;
            KkDvVtXbCtDf::where('masothue', $masothue)->delete();
            //$sql=" INSERT INTO kkdvvtxkctdf (masothue,diemdau,diemcuoi,madichvu,loaixe,tendichvu,qccl,dvt) SELECT masothue,diemdau,diemcuoi,madichvu,loaixe,tendichvu,qccl,dvt FROM dmdvvtxk where masothue='". session('admin')->mahuyen."'";
            //DB::statement($sql);

            $modelCB=CbKkDvVtXb::select('socv','ngaynhap','masokk')->where('masothue', $masothue)->first();
            $solk='';
            $ngaylk='';
            $masokk='';

            if (isset($modelCB)) {
                $solk = $modelCB->socv;
                $ngaylk = $modelCB->ngaynhap;
                $masokk = $modelCB->masokk;
            }
            $mdDV=DmDvVtXb::where('masothue',$masothue)->get();
            foreach($mdDV as $dv){
                $mdkk = new KkDvVtXbCtDf();
                $mdkk->masothue = $masothue;
                $mdkk->diemdau = $dv->diemdau;
                $mdkk->diemcuoi = $dv->diemcuoi;
                $mdkk->madichvu = $dv->madichvu;
                $mdkk->tendichvu = $dv->tendichvu;
                $mdkk->qccl = $dv->qccl;
                $mdkk->dvtluot = $dv->dvtluot;
                $mdkk->dvtthang = $dv->dvtthang;
                $mdCT = KkDvVtXbCt::select('giakkluot','giakkthang')->where('masokk', $masokk)->where('madichvu', $dv->madichvu)->first();
                $mdkk->giakklkluot = count($mdCT)>0 ? $mdCT->giakkluot : 0;
                $mdkk->giakklkthang = count($mdCT)>0 ? $mdCT->giakkthang : 0;
                $mdkk->giakkluot =0;
                $mdkk->giakkthang =0;
                $mdkk->save();
            }

            $model=KkDvVtXbCtDf::where('masothue', session('admin')->mahuyen)->get();

            return view('quanly.dvvt.dvxb.kkdv.create')
                ->with('pageTitle','Kê khai mới giá dịch vụ vận tải')
                ->with('socvlk',$solk)
                ->with('ngaycvlk',$ngaylk)
                ->with('model',$model);

        }else
            return view('errors.notlogin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Session::has('admin')) {
            $ma=getdate();
            $insert = $request->all();
            $model = new KkDvVtXb();
            $model->masokk = session('admin')->mahuyen . '.' . $ma[0];
            $model->ngaynhap = $insert['ngaynhap'];
            $model->socv = $insert['socv'];
            //$model->socvlk = $insert['socv'];
            $model->ngayhieuluc = $insert['ngayhieuluc'];
            $model->nguoinop=$insert['nguoinop'];
            $model->trangthai = 'Chờ chuyển';
            $model->masothue = session('admin')->mahuyen;
            $model->ghichu = $insert['ghichu'];
            $model->save();
            return redirect('dvvantai/dvxb/kekhai');

        }else
            return view('errors.notlogin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Session::has('admin')) {
            $model = KkDvVtXb::findOrFail($id);
            return view('quanly.dvvt.dvxb.kkdv.edit')
                ->with('model',$model)
                ->with('pageTitle','Chỉnh sửa kê khai giá dịch vụ vận tải');
        }else
            return view('errors.notlogin');
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
        if (Session::has('admin')) {
            $update = $request->all();
            $model = KkDvVtXb::findOrFail($id);
            $model->ngaynhap = $update['ngaynhap'];
            $model->socv = $update['socv'];
            $model->ngayhieuluc = $update['ngayhieuluc'];
            $model->ghichu = $update['ghichu'];
            $model->nguoinop = $update['nguoinop'];
            $model->ngaynhan = $update['ngaynhan'];
            $model->save();
            return redirect('dvvantai/dvxb/kekhai');
        }else
            return view('errors.notlogin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Session::has('admin')) {
            $model = KkDvVtXb::findOrFail($id);
            $model->delete();
            return redirect('dvvantai/dvxb/kekhai');
        }else
            return view('errors.notlogin');
    }

    public function chuyen(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if(!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        $inputs = $request->all();

        if(isset($inputs['id'])){
            $model = KkDvVtXb::findOrFail($inputs['id']);
            $model->trangthai = 'Chờ duyệt';
            $model->nguoinop = $inputs['nguoinop'];
            $model->ngaychuyen = $inputs['ngaychuyen'];
            $model->sdtnn = $inputs['sdtnn'];
            $model->faxnn = $inputs['faxnn'];
            $model->emailnn = $inputs['emailnn'];
            $model->save();
            $result['message'] = 'Chuyển thành công.';
            $result['status'] = 'success';
        }
        die(json_encode($result));
    }

    public function duyet($ids){
        if (Session::has('admin')) {
            $arrayid = explode('-',$ids);
            foreach($arrayid as $id){
                $model = KkDvVtXb::findOrFail($id);
                $model->trangthai = 'Duyệt';
                $model->save();
            }
            return redirect('dvvantai/dvxb/kekhai');
        }else
            return view('errors.notlogin');
    }

    public function boduyet($ids){
        if (Session::has('admin')) {
            $arrayid = explode('-',$ids);
            foreach($arrayid as $id){
                $model = KkDvVtXb::findOrFail($id);
                $model->trangthai = 'Chờ duyệt';
                $model->save();
            }
            return redirect('dvvantai/dvxb/kekhai');
        }else
            return view('errors.notlogin');
    }

    public function tralai($id){
        if (Session::has('admin')) {
            $model = KkDvVtXb::findOrFail($id);
            $model->trangthai = 'Chờ chuyển';
            $model->save();
            return redirect('dvvantai/dvxb/kekhai');
        }else
            return view('errors.notlogin');
    }
}
