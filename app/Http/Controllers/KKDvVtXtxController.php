<?php

namespace App\Http\Controllers;

use App\CbKkDvVtXtx;
use App\DmDvVtXtx;
use App\DonViDvVt;
use App\GeneralConfigs;
use App\KkDvVtXtx;
use App\KkDvVtXtxCt;
use App\KkDvVtXtxCtDf;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class KKDvVtXtxController extends Controller
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
                $model = KkDvVtXtx::where('trangthai','<>','Chờ chuyển')
                    ->where('trangthai','<>','Bị trả lại')
                    ->orderBy('ngaynhap', 'esc')
                    ->get();
            else
                $model = KkDvVtXtx::where('masothue',session('admin')->mahuyen)
                    ->orderBy('ngaynhap', 'esc')
                    ->get();

            return view('quanly.dvvt.dvxtx.kkdv.index')
                ->with('model',$model)
                ->with('url','dvvantai/dvxtx/kekhai/edit/')
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
                $model = KkDvVtXtx::where('trangthai','Chờ nhận')
                    ->orderBy('ngaynhap', 'esc')
                    ->get();
            elseif($tt == 'CD')
                $model = KkDvVtXtx::where('trangthai','Chờ duyệt')
                    ->orderBy('ngaynhap', 'esc')
                    ->get();
            elseif($tt == 'D')
                $model = KkDvVtXtx::where('trangthai','Duyệt')
                    ->orderBy('ngaynhap', 'esc')
                    ->get();
            else
                $model = CbKkDvVtXtx::groupby('masothue')
                    ->orderBy('ngaynhap', 'esc')
                    ->get();

            $modeldv = DonViDvVt::all();
            foreach($model as $dv){
                $this->getTenDV($modeldv, $dv);
            }
            //dd($model);
            return view('quanly.dvvt.dvxtx.index')
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
            KkDvVtXtxCtDf::where('masothue', $masothue)->delete();
            //$sql=" INSERT INTO kkdvvtxkctdf (masothue,diemdau,diemcuoi,madichvu,loaixe,tendichvu,qccl,dvt) SELECT masothue,diemdau,diemcuoi,madichvu,loaixe,tendichvu,qccl,dvt FROM dmdvvtxk where masothue='". session('admin')->mahuyen."'";
            //DB::statement($sql);

            $modelCB=CbKkDvVtXtx::select('socv','ngaynhap','masokk')->where('masothue', $masothue)->first();
            $solk='';
            $ngaylk='';
            $masokk='';

            if (isset($modelCB)) {
                $solk = $modelCB->socv;
                $ngaylk = $modelCB->ngaynhap;
                $masokk = $modelCB->masokk;
            }
            $mdDV=DmDvVtXtx::where('masothue',$masothue)->get();
            foreach($mdDV as $dv){
                $mdkk = new KkDvVtXtxCtDf();
                $mdkk->masothue = $masothue;
                $mdkk->madichvu = $dv->madichvu;
                $mdkk->loaixe = $dv->loaixe;
                $mdkk->tendichvu = $dv->tendichvu;
                $mdkk->qccl = $dv->qccl;
                $mdkk->dvt = $dv->dvt;
                $mdCT = KkDvVtXtxCt::select('giakk')->where('masokk', $masokk)->where('madichvu', $dv->madichvu)->first();

                $mdkk->giakklk = count($mdCT)>0 ? $mdCT->giakk : 0;
                $mdkk->giakk =0;
                $mdkk->save();
            }

            $model=KkDvVtXtxCtDf::where('masothue', session('admin')->mahuyen)->get();
            return view('quanly.dvvt.dvxtx.kkdv.create')
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

            $model = new KkDvVtXtx();
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

            DB::statement("Update KkDvVtXtxCtDf set masokk='".$makk."' where masothue='". $masothue."'");

            $sql="INSERT INTO kkdvvtxtxct (masokk,madichvu,loaixe,tendichvu,qccl,dvt,giakk,giakklk)
                  SELECT masokk,madichvu,loaixe,tendichvu,qccl,dvt,giakk,giakklk FROM kkdvvtxtxctdf where masokk='". $makk."'";
            DB::statement($sql);

            //DB::statement("INSERT INTO cbkkdvvtxk SELECT * FROM kkdvvtxk WHERE masokk='".$makk."'");

            return redirect('dvvantai/dvxtx/kekhai/index');
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
            $model = KkDvVtXtx::findOrFail($id);
            $modeldv=KkDvVtXtxCt::where('masokk',$model->masokk)->get();
            return view('quanly.dvvt.dvxtx.kkdv.edit')
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
            $model = KkDvVtXtx::findOrFail($id);
            $model->ngaynhap = $update['ngaynhap'];
            $model->socv = $update['socv'];
            $model->ngaynhaplk = $update['ngaynhaplk'];
            $model->socvlk = $update['socvlk'];
            $model->ngayhieuluc = $update['ngayhieuluc'];
            $model->ghichu = $update['ghichu'];
            $model->uudai = $update['uudai'];
            $model->save();
            return redirect('dvvantai/dvxtx/kekhai/index');
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

            $model = KkDvVtXtx::findOrFail($id);
            $model->delete();
            return redirect('dvvantai/dvxtx/kekhai/index');
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
            $model = KkDvVtXtx::findOrFail($inputs['id']);
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
            $model = KkDvVtXtx::findOrFail($id);
            $model->trangthai = 'Duyệt';
            //$model->ngaychuyen = Carbon::now()->toDateTimeString();
            $model->save();

            $result['message'] = 'Xét duyệt thành công.';
            $result['status'] = 'success';

            $modelkk = KkDvVtXtx::findOrFail($id);
            $modeldel = CbKkDvVtXtx::where('masothue',$modelkk->masothue)->delete();

            DB::statement("INSERT INTO cbkkdvvtxtx SELECT * FROM kkdvvtxtx WHERE id='".$id."'");
            DB::statement("Update cbkkdvvtxtx set trangthai='Đang công bố' WHERE masokk='".$modelkk->masokk."'");
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
            $model = KkDvVtXtx::findOrFail($id);
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
            $model = KkDvVtXtx::findOrFail($inputs['id']);
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

            $model = KkDvVtXtxCtDf::findOrFail($inputs['id']);
            $model->giakk = $inputs['giakk'];
            $model->giakklk = $inputs['giakklk'];
            $model->save();
            //Trả lại kết quả
            $result['message'] = '<tbody id="noidung">';
            $DMDV = KkDvVtXtxCtDf::where('masothue', session('admin')->mahuyen)->get();

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
                    .' class="fa fa-edit"></i>&nbsp;Kê khai giá'
                    .'</button>';
                $result['message'] .='</br>';
                $result['message'] .='<button type="button" data-target="#modal-pagia-create"
                                        data-toggle="modal" class="btn btn-default btn-xs mbs"
                                        onclick="editpagia('.$dv->tendichvu.','.$dv->tendichvu.')"><i class="fa fa-edit"></i>&nbsp;Phương án giá';
                $result['message'] .='</button>';
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

            $model = KkDvVtXtxCt::findOrFail($inputs['id']);
            $model->giakk = $inputs['giakk'];
            $model->giakklk = $inputs['giakklk'];
            $model->save();
            //Trả lại kết quả
            $result['message'] = '<tbody id="noidung">';
            $DMDV = KkDvVtXtxCt::where('masokk', $inputs['masokk'])->get();

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
                    .' class="fa fa-edit"></i>&nbsp;Kê khai giá'
                    .'</button>';
                $result['message'] .='</br>';
                $result['message'] .='<button type="button" data-target="#modal-pagia-create"
                                        data-toggle="modal" class="btn btn-default btn-xs mbs"
                                        onclick="editpagia('.$dv->tendichvu.','.$dv->tendichvu.')"><i class="fa fa-edit"></i>&nbsp;Phương án giá';
                $result['message'] .='</button>';
                $result['message'] .= '</td >';
                $result['message'] .= '</tr >';
            }
            $result['message'] .= '</tbody>';
            $result['status'] = 'success';
        }

        die(json_encode($result));
    }
}
