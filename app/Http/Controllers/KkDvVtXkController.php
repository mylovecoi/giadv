<?php

namespace App\Http\Controllers;

use App\CbKkDvVtXk;
use App\DmDvVtXk;
use App\GeneralConfigs;
use App\KkDvVtXkCt;
use App\KkDvVtXkCtDf;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\KkDvVtXk;
use App\DonViDvVt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
            $datetime = Carbon::now()->toDateTimeString();
            if(session('admin')->level == 'T')
                $model = KkDvVtXk::where('trangthai','<>','Chờ chuyển')
                    ->where('trangthai','<>','Bị trả lại')
                    ->orderBy('ngaynhap', 'esc')
                    ->get();
            else
                $model = KkDvVtXk::where('masothue',session('admin')->mahuyen)
                    ->orderBy('ngaynhap', 'esc')
                    ->get();

            return view('quanly.dvvt.dvxk.kkdv.index')
                ->with('model',$model)
                ->with('url','dvvantai/kkdvxk/edit/')
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
                $model = KkDvVtXk::where('trangthai','Chờ nhận')
                    ->orderBy('ngaynhap', 'esc')
                    ->get();
            elseif($tt == 'CD')
                $model = KkDvVtXk::where('trangthai','Chờ duyệt')
                    ->orderBy('ngaynhap', 'esc')
                    ->get();
            elseif($tt == 'D')
                $model = KkDvVtXk::where('trangthai','Duyệt')
                    ->orderBy('ngaynhap', 'esc')
                    ->get();
            else
                $model = CbKkDvVtXk::groupby('masothue')
                    ->orderBy('ngaynhap', 'esc')
                    ->get();

            $modeldv = DonViDvVt::all();
            foreach($model as $dv){
                $this->getTenDV($modeldv, $dv);
            }
            //dd($model);
            return view('quanly.dvvt.dvxk.index')
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
            KkDvVtXkCtDf::where('masothue', $masothue)->delete();
            //$sql=" INSERT INTO kkdvvtxkctdf (masothue,diemdau,diemcuoi,madichvu,loaixe,tendichvu,qccl,dvt) SELECT masothue,diemdau,diemcuoi,madichvu,loaixe,tendichvu,qccl,dvt FROM dmdvvtxk where masothue='". session('admin')->mahuyen."'";
            //DB::statement($sql);

            $modelCB=CbKkDvVtXk::select('socv','ngaynhap','masokk')->where('masothue', $masothue)->first();
            $solk='';
            $ngaylk='';
            $masokk='';

            if (isset($modelCB)) {
                //dd($modelCB);
                $solk = $modelCB->socv;
                $ngaylk = $modelCB->ngaynhap;
                $masokk = $modelCB->masokk;
            }
            $mdDV=DmDvVtXk::where('masothue',$masothue)->get();
            foreach($mdDV as $dv){
                $mdkk = new KkDvVtXkCtDf();
                $mdkk->masothue = $masothue;
                $mdkk->diemdau = $dv->diemdau;
                $mdkk->diemcuoi = $dv->diemcuoi;
                $mdkk->madichvu = $dv->madichvu;
                $mdkk->loaixe = $dv->loaixe;
                $mdkk->tendichvu = $dv->tendichvu;
                $mdkk->qccl = $dv->qccl;
                $mdkk->dvt = $dv->dvt;
                $mdCT = KkDvVtXkCt::select('giakk')->where('masokk', $masokk)->where('madichvu', $dv->madichvu)->first();

                $mdkk->giakklk = count($mdCT)>0 ? $mdCT->giakk : 0;
                $mdkk->giakk =0;
                $mdkk->giahl =0;
                $mdkk->save();
            }

            $model=KkDvVtXkCtDf::where('masothue', session('admin')->mahuyen)->get();
            return view('quanly.dvvt.dvxk.kkdv.create')
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
            $insert = $request->all();

            $model = new KkDvVtXk();
            $model->masokk = $makk;
            $model->ngaynhap = $insert['ngaynhap'];
            $model->socv = $insert['socv'];
            $model->socvlk = $insert['socvlk'];
            $model->ngaynhaplk = $insert['ngaynhaplk'];
            $model->ngayhieuluc = $insert['ngayhieuluc'];
            $model->trangthai = 'Chờ chuyển';
            $model->masothue = session('admin')->mahuyen;
            $model->uudai = $insert['uudai'];
            $model->ghichu = $insert['ghichu'];
            $model->save();

            DB::statement("Update KkDvVtXkCtDf set masokk='".$makk."' where masothue='". session('admin')->mahuyen."'");

            $sql="INSERT INTO kkdvvtxkct (masokk,diemdau,diemcuoi,madichvu,loaixe,tendichvu,qccl,dvt,giakk,giakklk,giahl)
                  SELECT masokk,diemdau,diemcuoi,madichvu,loaixe,tendichvu,qccl,dvt,giakk,giakklk,giahl FROM kkdvvtxkctdf where masokk='". $makk."'";
            DB::statement($sql);

            //DB::statement("INSERT INTO cbkkdvvtxk SELECT * FROM kkdvvtxk WHERE masokk='".$makk."'");

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
            $modeldv=KkDvVtXkCt::where('masokk',$model->masokk)->get();
            return view('quanly.dvvt.dvxk.kkdv.edit')
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
            $model = KkDvVtXk::findOrFail($id);
            $model->ngaynhap = $update['ngaynhap'];
            $model->socv = $update['socv'];
            $model->ngaynhaplk = $update['ngaynhaplk'];
            $model->socvlk = $update['socvlk'];
            $model->ngayhieuluc = $update['ngayhieuluc'];
            $model->ghichu = $update['ghichu'];
            $model->uudai = $update['uudai'];
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
            $model = KkDvVtXk::findOrFail($id);
            $model->trangthai = 'Duyệt';
            //$model->ngaychuyen = Carbon::now()->toDateTimeString();
            $model->save();

            $result['message'] = 'Xét duyệt thành công.';
            $result['status'] = 'success';

            $modelkk = KkDvVtXk::findOrFail($id);
            $modeldel = CbKkDvVtXk::where('masothue',$modelkk->masothue)->delete();

            DB::statement("INSERT INTO cbkkdvvtxk SELECT * FROM kkdvvtxk WHERE id='".$id."'");
            DB::statement("Update cbkkdvvtxk set trangthai='Đang công bố' WHERE id='".$id."'");
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
            $model = KkDvVtXk::findOrFail($id);
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

            $inputs['giakk'] = str_replace(',','',$inputs['giakk']);
            $inputs['giakk'] = str_replace('.','',$inputs['giakk']);
            $inputs['giakklk'] = str_replace(',','',$inputs['giakklk']);
            $inputs['giakklk'] = str_replace('.','',$inputs['giakklk']);
            $inputs['giahl'] = str_replace(',','',$inputs['giahl']);
            $inputs['giahl'] = str_replace('.','',$inputs['giahl']);

            $model = KkDvVtXkCtDf::findOrFail($inputs['id']);
            $model->giakk = $inputs['giakk'];
            $model->giakklk = $inputs['giakklk'];
            $model->giahl = $inputs['giahl'];
            $model->save();
            //Trả lại kết quả
            $result['message'] = '<tbody id="noidung">';
            $DMDV = KkDvVtXkCtDf::where('masothue', session('admin')->mahuyen)->get();

                foreach($DMDV as $dv) {
                    $result['message'] .= '<tr>';
                    $result['message'] .= '<td name = "loaixe">'.$dv->loaixe.'</td>';
                    $result['message'] .= '<td name = "tendichvu">'.$dv->tendichvu.'</td>';
                    $result['message'] .= '<td name = "giakklk">'.number_format($dv->giakklk).'</td>';
                    $result['message'] .= '<td name = "giakk">'.number_format($dv->giakk).'</td>';
                    $result['message'] .= '<td name = "giahl">'.number_format($dv->giahl).'</td>';
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
            $inputs['giahl'] = getDbl($inputs['giahl']);

            $model = KkDvVtXkCt::findOrFail($inputs['id']);
            $model->giakk = $inputs['giakk'];
            $model->giakklk = $inputs['giakklk'];
            $model->giahl = $inputs['giahl'];
            $model->save();
            //Trả lại kết quả
            $result['message'] = '<tbody id="noidung">';
            $DMDV = KkDvVtXkCt::where('masokk', $model->masokk)->get();

            foreach($DMDV as $dv) {
                $result['message'] .= '<tr>';
                $result['message'] .= '<td name = "loaixe">'.$dv->loaixe.'</td>';
                $result['message'] .= '<td name = "tendichvu">'.$dv->tendichvu.'</td>';
                $result['message'] .= '<td name = "giakklk">'.number_format($dv->giakklk).'</td>';
                $result['message'] .= '<td name = "giakk">'.number_format($dv->giakk).'</td>';
                $result['message'] .= '<td name = "giahl">'.number_format($dv->giahl).'</td>';
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
}
