<?php

namespace App\Http\Controllers;

use App\CbKkDvVtXb;
use App\DmDvVtXb;
use App\DonViDvVt;
use App\GeneralConfigs;
use App\KkDvVtXb;
use App\KkDvVtXbCtDf;
use App\KkDvVtXbCt;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
                ->with('url','/dvvantai/dvxb/kekhai/edit/')
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

    public function indexXD($tt)
    {
        if (Session::has('admin')) {
            if($tt == 'CN')
                $model = KkDvVtXb::where('trangthai','Chờ nhận')
                    ->orderBy('ngaynhap', 'esc')
                    ->get();
            elseif($tt == 'CD')
                $model = KkDvVtXb::where('trangthai','Chờ duyệt')
                    ->orderBy('ngaynhap', 'esc')
                    ->get();
            elseif($tt == 'D')
                $model = KkDvVtXb::where('trangthai','Duyệt')
                    ->orderBy('ngaynhap', 'esc')
                    ->get();
            else
                $model = CbKkDvVtXb::groupby('masothue')
                    ->orderBy('ngaynhap', 'esc')
                    ->get();

            $modeldv = DonViDvVt::all();
            foreach($model as $dv){
                $this->getTenDV($modeldv, $dv);
            }
            //dd($model);
            return view('quanly.dvvt.dvxb.index')
                ->with('model',$model)
                ->with('tt',$tt)
                ->with('pageTitle','Xét duyệt kê khai giá dịch vụ vận tải bằng ô tô theo tuyến cố định');

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
            $makk=session('admin')->mahuyen . '.' . getdate()[0];
            $masothue=session('admin')->mahuyen;
            $insert = $request->all();

            $model = new KkDvVtXb();
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

            DB::statement("Update KkDvVtXbCtDf set masokk='".$makk."' where masothue='". $masothue ."'");

            $sql="INSERT INTO kkdvvtxbct (masokk,diemdau,diemcuoi,madichvu,tendichvu,qccl,dvtluot,dvtthang,giakkluot,giakklkluot,giakkthang,giakklkthang)
                  SELECT masokk,diemdau,diemcuoi,madichvu,tendichvu,qccl,dvtluot,dvtthang,giakkluot,giakklkluot,giakkthang,giakklkthang FROM kkdvvtxbctdf where masokk='". $makk."'";
            DB::statement($sql);

            return redirect('dvvantai/dvxb/kekhai/index');

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
            //dd($model->masokk);
            $modeldv=KkDvVtXbCt::where('masokk',$model->masokk)->get();
            return view('quanly.dvvt.dvxb.kkdv.edit')
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
            $model = KkDvVtXb::findOrFail($id);
            $model->ngaynhap = $update['ngaynhap'];
            $model->ngaynhaplk = $update['ngaynhaplk'];
            $model->socv = $update['socv'];
            $model->socvlk = $update['socvlk'];
            $model->ngayhieuluc = $update['ngayhieuluc'];
            $model->ghichu = $update['ghichu'];
            $model->uudai = $update['uudai'];
            $model->save();
            return redirect('dvvantai/dvxb/kekhai/index');
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
            return redirect('dvvantai/dvxb/kekhai/index');
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
            $model->trangthai = 'Chờ nhận';
            $model->ttnguoinop = $inputs['ttnguoinop'];
            $model->ngaychuyen = Carbon::now()->toDateTimeString();
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
            $model = KkDvVtXb::findOrFail($inputs['id']);
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

            $inputs['giakkluot'] = getDbl($inputs['giakkluot']);
            $inputs['giakkthang'] = getDbl($inputs['giakkthang']);
            $inputs['giakklkthang'] =  getDbl($inputs['giakklkthang']);
            $inputs['giakklkluot'] =  getDbl($inputs['giakklkluot']);

            $model = KkDvVtXbCtDf::findOrFail($inputs['id']);
            $model->giakkluot = $inputs['giakkluot'];
            $model->giakkthang = $inputs['giakkthang'];
            $model->giakklkthang = $inputs['giakklkthang'];
            $model->giakklkluot = $inputs['giakklkluot'];
            $model->save();
            //Trả lại kết quả
            $result['message'] = '<tbody id="noidung">';
            $DMDV = KkDvVtXbCtDf::where('masothue', session('admin')->mahuyen)->get();

            foreach($DMDV as $dv) {
                $result['message'] .= '<tr>';
                $result['message'] .= '<td name="tendichvu">'.$dv->tendichvu.'</td>';
                $result['message'] .= '<td name="qccl">'.$dv->qccl.'</td>';
                $result['message'] .= '<td name="giakklkluot">'.number_format($dv->giakklkluot).'</td>';
                $result['message'] .= '<td name="giakkluot">'.number_format($dv->giakkluot).'</td>';
                $result['message'] .= '<td name="giakklkthang">'.number_format($dv->giakklkthang).'</td>';
                $result['message'] .= '<td name="giakkthang">'.number_format($dv->giakkthang).'</td>';
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

            $inputs['giakkluot'] = getDbl($inputs['giakkluot']);
            $inputs['giakkthang'] = getDbl($inputs['giakkthang']);
            $inputs['giakklkthang'] =  getDbl($inputs['giakklkthang']);
            $inputs['giakklkluot'] =  getDbl($inputs['giakklkluot']);

            $model = KkDvVtXbCt::findOrFail($inputs['id']);
            $model->giakkluot = $inputs['giakkluot'];
            $model->giakkthang = $inputs['giakkthang'];
            $model->giakklkthang = $inputs['giakklkthang'];
            $model->giakklkluot = $inputs['giakklkluot'];
            $model->save();
            //Trả lại kết quả
            $result['message'] = '<tbody id="noidung">';
            $DMDV = KkDvVtXbCt::where('masokk', $model->masokk)->get();

            foreach($DMDV as $dv) {
                $result['message'] .= '<tr>';
                $result['message'] .= '<td name="tendichvu">'.$dv->tendichvu.'</td>';
                $result['message'] .= '<td name="qccl">'.$dv->qccl.'</td>';
                $result['message'] .= '<td name="giakklkluot">'.number_format($dv->giakklkluot).'</td>';
                $result['message'] .= '<td name="giakkluot">'.number_format($dv->giakkluot).'</td>';
                $result['message'] .= '<td name="giakklkthang">'.number_format($dv->giakklkthang).'</td>';
                $result['message'] .= '<td name="giakkthang">'.number_format($dv->giakkthang).'</td>';
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
            $model = KkDvVtXb::findOrFail($id);
            $model->trangthai = 'Duyệt';
            //$model->ngaychuyen = Carbon::now()->toDateTimeString();
            $model->save();

            $result['message'] = 'Xét duyệt thành công.';
            $result['status'] = 'success';

            $modelkk = KkDvVtXb::findOrFail($id);
            $modeldel = CbKkDvVtXb::where('masothue',$modelkk->masothue)->delete();

            DB::statement("INSERT INTO cbkkdvvtxb SELECT * FROM kkdvvtxb WHERE id='".$id."'");
            DB::statement("Update cbkkdvvtxb set trangthai='Đang công bố' WHERE masokk='".$modelkk->masokk."'");
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
            $model = KkDvVtXb::findOrFail($id);
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
}
