<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\KkDvVtXk;
use App\DonViDvVt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KkDvVtXkController extends Controller
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
                $model = KkDvVtXk::where('trangthai','<>','Chờ chuyển')
                    ->get();
            else
                $model = KkDvVtXk::where('masothue',session('admin')->mahuyen)
                    ->get();

            $modeldonvi = DonViDvVt::all();

            foreach($model as $dn){
                $this->getTenDV($modeldonvi,$dn);
            }

            return view('quanly.dvvt.dvxk.kkdv.index')
                ->with('model',$model)
                ->with('pageTitle','Kê khai giá dịch vụ vận tải bằng ô tô theo tuyến cố định');

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
            return view('quanly.dvvt.dvxk.kkdv.create')
                ->with('pageTitle','Kê khai mới giá dịch vụ vận tải bằng ô tô theo tuyến cố định');

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
            $model = new KkDvVtXk();
            $model->masokk = session('admin')->mahuyen . '.' . $ma[0];
            $model->ngaynhap = $insert['ngaynhap'];
            $model->socv = $insert['socv'];
            //$model->socvlk = $insert['socv']; lấy trong bảng công bố
            $model->ngayhieuluc = $insert['ngayhieuluc'];
            //$model->nguoinop=$insert['nguoinop'];
            $model->trangthai = 'Chờ chuyển';
            $model->masothue = session('admin')->mahuyen;
            $model->ghichu = $insert['ghichu'];
            $model->save();
            return redirect('dvvantai/kkdvxk');

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
            $model = KkDvVtXk::findOrFail($id);
            return view('quanly.dvvt.dvxk.kkdv.edit')
                ->with('model',$model)
                ->with('pageTitle','Chỉnh sửa kê khai giá dịch vụ vận tài bằng ô tô theo tuyến cố định');
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
            $model = KkDvVtXk::findOrFail($id);
            $model->ngaynhap = $update['ngaynhap'];
            $model->socv = $update['socv'];
            $model->ngayhieuluc = $update['ngayhieuluc'];
            $model->ghichu = $update['ghichu'];
            //$model->nguoinop = $update['nguoinop'];
            $model->ngaynhan = $update['ngaynhan'];
            $model->save();
            return redirect('dvvantai/kkdvxk');
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

            $model = KkDvVtXk::findOrFail($id);
            $model->delete();
            return redirect('dvvantai/kkdvxk');
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
            $model = KkDvVtXk::findOrFail($inputs['id']);
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
                $model = KkDvVtXk::findOrFail($id);
                $model->trangthai = 'Duyệt';
                $model->save();
            }
            return redirect('dvvantai/kkdvxk');
        }else
            return view('errors.notlogin');
    }

    public function boduyet($ids){
        if (Session::has('admin')) {
            $arrayid = explode('-',$ids);
            foreach($arrayid as $id){
                $model = KkDvVtXk::findOrFail($id);
                $model->trangthai = 'Chờ duyệt';
                $model->save();
            }
            return redirect('dvvantai/kkdvxk');
        }else
            return view('errors.notlogin');
    }

    public function tralai(Request $request){
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
            $model = KkDvVtXk::findOrFail($inputs['id']);
            $model->trangthai = 'Bị trả lại';
            $model->lydo = $inputs['lydo'];
            /* có nên xóa thông tin người nôp khi trả lại ko ?????
            $model->nguoinop = $inputs['nguoinop'];
            $model->ngaychuyen = $inputs['ngaychuyen'];
            $model->sdtnn = $inputs['sdtnn'];
            $model->faxnn = $inputs['faxnn'];
            $model->emailnn = $inputs['emailnn'];
            */
            $model->save();
            $result['message'] = 'Trả lại thành công.';
            $result['status'] = 'success';
        }
        die(json_encode($result));
    }
}
