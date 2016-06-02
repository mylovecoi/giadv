<?php

namespace App\Http\Controllers;

use App\CbKkDvVtKhac;
use App\DmDvVtKhac;
use App\DonViDvVt;
use App\GeneralConfigs;
use App\KkDvVtKhac;
use App\KkDvVtKhacCt;
use App\KkDvVtKhacCtDf;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class KKDvVtKhacController extends Controller
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
                $model = KkDvVtKhac::where('trangthai','<>','Chờ chuyển')
                    ->where('trangthai','<>','Bị trả lại')
                    ->orderBy('ngaynhap', 'esc')
                    ->get();
            else
                $model = KkDvVtKhac::where('masothue',session('admin')->mahuyen)
                    ->orderBy('ngaynhap', 'esc')
                    ->get();

            return view('quanly.dvvt.dvkhac.kkdv.index')
                ->with('model',$model)
                ->with('url','dvvantai/dvkhac/kekhai/edit/')
                ->with('pageTitle','Kê khai giá dịch vụ vận tải');
        }else
            return view('errors.notlogin');
    }

    public function getTenDV($atenDV, $array){
        foreach($atenDV as $tenDV){
            if($tenDV->masothue == $array->masothue)
                $array->tendonvi = $tenDV->tendonvi;
        }
    }

    public function indexXD($tt)
    {
        if (Session::has('admin')) {
            if($tt == 'CN')
                $model = KkDvVtKhac::where('trangthai','Chờ nhận')
                    ->orderBy('ngaynhap', 'esc')
                    ->get();
            elseif($tt == 'CD')
                $model = KkDvVtKhac::where('trangthai','Chờ duyệt')
                    ->orderBy('ngaynhap', 'esc')
                    ->get();
            elseif($tt == 'D')
                $model = KkDvVtKhac::where('trangthai','Duyệt')
                    ->orderBy('ngaynhap', 'esc')
                    ->get();
            else
                $model = CbKkDvVtKhac::groupby('masothue')
                    ->orderBy('ngaynhap', 'esc')
                    ->get();

            $modeldv = DonViDvVt::all();
            foreach($model as $dv){
                $this->getTenDV($modeldv, $dv);
            }
            //dd($model);
            return view('quanly.dvvt.dvkhac.index')
                ->with('model',$model)
                ->with('tt',$tt)
                ->with('pageTitle','Xét duyệt kê khai giá dịch vụ vận tải');

        }else
            return view('errors.notlogin');
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
            KkDvVtKhacCtDf::where('masothue', $masothue)->delete();
            //$sql=" INSERT INTO kkdvvtxkctdf (masothue,diemdau,diemcuoi,madichvu,loaixe,tendichvu,qccl,dvt) SELECT masothue,diemdau,diemcuoi,madichvu,loaixe,tendichvu,qccl,dvt FROM dmdvvtxk where masothue='". session('admin')->mahuyen."'";
            //DB::statement($sql);

            $modelCB=CbKkDvVtKhac::select('socv','ngaynhap','masokk')->where('masothue', $masothue)->first();
            $solk='';
            $ngaylk='';
            $masokk='';

            if (isset($modelCB)) {
                $solk = $modelCB->socv;
                $ngaylk = $modelCB->ngaynhap;
                $masokk = $modelCB->masokk;
            }
            $mdDV=DmDvVtKhac::where('masothue',$masothue)->get();
            foreach($mdDV as $dv){
                $mdkk = new KkDvVtKhacCtDf();
                $mdkk->masothue = $masothue;
                $mdkk->madichvu = $dv->madichvu;
                $mdkk->loaixe = $dv->loaixe;
                $mdkk->diemdau = $dv->diemdau;
                $mdkk->diemcuoi = $dv->diemcuoi;
                $mdkk->tendichvu = $dv->tendichvu;
                $mdkk->qccl = $dv->qccl;
                $mdkk->dvt = $dv->dvt;
                $mdCT = KkDvVtKhacCt::select('giakk')->where('masokk', $masokk)->where('madichvu', $dv->madichvu)->first();

                $mdkk->giakklk = count($mdCT)>0 ? $mdCT->giakk : 0;
                $mdkk->giakk =0;
                $mdkk->save();
            }

            $model=KkDvVtKhacCtDf::where('masothue', session('admin')->mahuyen)->get();
            return view('quanly.dvvt.dvkhac.kkdv.create')
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
            $makk=session('admin')->mahuyen . '.' . getdate()[0];
            $masothue=session('admin')->mahuyen;
            $insert = $request->all();

            $model = new KkDvVtKhac();
            $model->masokk = $makk;
            $model->ngaynhap = $insert['ngaynhap'];
            $model->socv = $insert['socv'];
            $model->socvlk = $insert['socvlk'];
            $model->ngaynhaplk = $insert['ngaynhaplk'];
            $model->ngayhieuluc = $insert['ngayhieuluc'];
            $model->trangthai = 'Chờ chuyển';
            $model->masothue = $masothue;
            $model->uudai = $insert['uudai'];
            $model->ghichu = $insert['ghichu'];
            $model->save();

            DB::statement("Update KkDvVtKhacCtDf set masokk='".$makk."' where masothue='". $masothue."'");

            $sql="INSERT INTO kkdvvtkhacct (masokk,madichvu,loaixe,diemdau,diemcuoi,tendichvu,qccl,dvt,giakk,giakklk)
                  SELECT masokk,madichvu,loaixe,diemdau,diemcuoi,tendichvu,qccl,dvt,giakk,giakklk FROM kkdvvtkhacctdf where masokk='". $makk."'";
            DB::statement($sql);

            //DB::statement("INSERT INTO cbkkdvvtxk SELECT * FROM kkdvvtxk WHERE masokk='".$makk."'");

            return redirect('dvvantai/dvkhac/kekhai/index');
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
            $model = KkDvVtKhac::findOrFail($id);
            $modeldv=KkDvVtKhacCt::where('masokk',$model->masokk)->get();
            return view('quanly.dvvt.dvkhac.kkdv.edit')
                ->with('model',$model)
                ->with('modeldv',$modeldv)
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
            $model = KkDvVtKhac::findOrFail($id);
            $model->ngaynhap = $update['ngaynhap'];
            $model->socv = $update['socv'];
            $model->ngaynhaplk = $update['ngaynhaplk'];
            $model->socvlk = $update['socvlk'];
            $model->ngayhieuluc = $update['ngayhieuluc'];
            $model->ghichu = $update['ghichu'];
            //$model->nguoinop = $update['nguoinop'];
            $model->uudai = $update['uudai'];
            $model->save();
            return redirect('dvvantai/dvkhac/kekhai/index');
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

            $model = KkDvVtKhac::findOrFail($id);
            $model->delete();
            return redirect('dvvantai/dvkhac/kekhai/index');
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
            $model = KkDvVtKhac::findOrFail($inputs['id']);
            $model->trangthai = 'Chờ nhận';
            $model->ttnguoinop = $inputs['ttnguoinop'];
            $model->ngaychuyen = Carbon::now()->toDateTimeString();
            $model->save();
            $result['message'] = 'Chuyển thành công.';
            $result['status'] = 'success';
        }
        die(json_encode($result));
    }

    public function accept(Request $request){
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
            $id=$inputs['id'];
            $model = KkDvVtKhac::findOrFail($id);
            $model->trangthai = 'Duyệt';
            //$model->ngaychuyen = Carbon::now()->toDateTimeString();
            $model->save();

            $result['message'] = 'Xét duyệt thành công.';
            $result['status'] = 'success';

            $modelkk = KkDvVtKhac::findOrFail($id);
            $modeldel = CbKkDvVtKhac::where('masothue',$modelkk->masothue)->delete();

            DB::statement("INSERT INTO cbkkdvvtkhac SELECT * FROM kkdvvtkhac WHERE id='".$id."'");
            DB::statement("Update cbkkdvvtkhac set trangthai='Đang công bố' WHERE masokk='".$modelkk->masokk."'");
        }
        die(json_encode($result));
    }

    public function nhanhs(Request $request){
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
        $input = $request->all();
        $id=$input['id'];
        if (Session::has('admin')) {
            $model = KkDvVtKhac::findOrFail($id);
            $model->ngaynhan = $input['ngaynhan'];
            $model->sohsnhan = $input['sohsnhan'];
            $model->trangthai = 'Chờ duyệt';
            if($model->save()){
                $modelconfig = GeneralConfigs::first();
                $modelconfig->sodvvt = getGeneralConfigs()['sodvvt'] + 1;
                $modelconfig->save();
            }
            $result['message'] = 'Trả lại thành công.';
            $result['status'] = 'success';
        }
        die(json_encode($result));
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
            $model = KkDvVtKhac::findOrFail($inputs['id']);
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

    public function updategiadv(Request $request){
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

            $inputs['giakk'] = getDbl($inputs['giakk']);
            $inputs['giakklk'] = getDbl($inputs['giakklk']);

            $model = KkDvVtKhacCtDf::findOrFail($inputs['id']);
            $model->giakk = $inputs['giakk'];
            $model->giakklk = $inputs['giakklk'];
            $model->save();
            //Trả lại kết quả
            $result['message'] = '<tbody id="noidung">';
            $DMDV = KkDvVtKhacCtDf::where('masothue', session('admin')->mahuyen)->get();

            foreach($DMDV as $dv) {
                $result['message'] .= '<tr>';
                $result['message'] .= '<td name = "loaixe">'.$dv->loaixe.'</td>';
                $result['message'] .= '<td name = "tendichvu">'.$dv->tendichvu.'</td>';
                $result['message'] .= '<td name = "giakklk">'.number_format($dv->giakklk).'</td>';
                $result['message'] .= '<td name = "giakk">'.number_format($dv->giakk).'</td>';
                $result['message'] .= '<td>'
                    .'<button type="button" data-target="#modal-create" '
                    .'data-toggle="modal" class="btn btn-default btn-xs mbs"'
                    .'onclick="editItem(this,'.$dv->id.')"><i'
                    .'class="fa fa-edit"></i>&nbsp;Kê khai giá'
                    .'</button>';
                $result['message'] .= '</td >';
                $result['message'] .= '</tr >';
            }
            $result['message'] .= '</tbody>';
            $result['status'] = 'success';
        }

        die(json_encode($result));
    }

    public function updategiadvct(Request $request){
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

            $inputs['giakk'] = getDbl($inputs['giakk']);
            $inputs['giakklk'] = getDbl($inputs['giakklk']);

            $model = KkDvVtKhacCt::findOrFail($inputs['id']);
            $model->giakk = $inputs['giakk'];
            $model->giakklk = $inputs['giakklk'];
            $model->save();
            //Trả lại kết quả
            $result['message'] = '<tbody id="noidung">';
            $DMDV = KkDvVtKhacCt::where('masokk', $model->masokk)->get();

            foreach($DMDV as $dv) {
                $result['message'] .= '<tr>';
                $result['message'] .= '<td name = "loaixe">'.$dv->loaixe.'</td>';
                $result['message'] .= '<td name = "tendichvu">'.$dv->tendichvu.'</td>';
                $result['message'] .= '<td name = "giakklk">'.number_format($dv->giakklk).'</td>';
                $result['message'] .= '<td name = "giakk">'.number_format($dv->giakk).'</td>';
                $result['message'] .= '<td>'
                    .'<button type="button" data-target="#modal-create" '
                    .'data-toggle="modal" class="btn btn-default btn-xs mbs"'
                    .'onclick="editItem(this,'.$dv->id.','.$dv->masokk.')"><i'
                    .'class="fa fa-edit"></i>&nbsp;Kê khai giá'
                    .'</button>';
                $result['message'] .= '</td >';
                $result['message'] .= '</tr >';
            }
            $result['message'] .= '</tbody>';
            $result['status'] = 'success';
        }

        die(json_encode($result));
    }
}
