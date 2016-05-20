<?php

namespace App\Http\Controllers;

use App\CbKkGDvLt;
use App\CsKdDvLt;
use App\DnDvLt;
use App\GeneralConfigs;
use App\KkGDvLt;
use App\KkGDvLtCt;
use App\KkGDvLtCtDf;
use App\TtCsKdDvLt;
use App\TtPhong;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DvLtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tt)
    {
        if (Session::has('admin')) {
            if($tt == 'CD'){
                $model = KkGDvLt::where('trangthai','Chờ duyệt')
                    ->get();
            }elseif($tt == 'D'){
                $model = KkGDvLt::where('trangthai','Duyệt')
                    ->get();
            }else{
                $model = CbKkGDvLt::all();
            }

            $modelcskd = CsKdDvLt::all();
            foreach($model as $ttkk){
                $this->getTTCSKD($modelcskd,$ttkk);
            }

            return view('quanly.dvlt.index')
                ->with('model',$model)
                ->with('tt',$tt)
                ->with('pageTitle','Thông tin cơ sở kinh doanh');

        }else
            return view('errors.notlogin');
    }

    public function getTTCSKD($cskds,$array){
        foreach($cskds as $cskd){
            if($cskd->masothue == $array->masothue){
                $array->tencskd = $cskd->tencskd;
            }
        }
    }

    public function tralai(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            $model = KkGDvLt::where('id',$input['idtralai'])
                ->first();
            $model->lydo = $input['lydo'];
            $model->trangthai = 'Bị trả lại';
            $model->save();

            return redirect('xetduyetkkgdvlt/'.$input['tt']);

        }else
            return view('errors.notlogin');
    }

    public function duyet(Request $request){
        if (Session::has('admin')) {

            $input = $request->all();
            $model = KkGDvLt::where('id',$input['idduyet'])
                ->first();
            //dd($input['tt']);
            $model->trangthai = 'Duyệt';
            $model->ngaynhan = Carbon::now()->toDateString();
            $model->sohsnhan = getGeneralConfigs()['sodvlt'] + 1;
            if($model->save()){
                $modelconfig = GeneralConfigs::first();
                $modelconfig->sodvlt = getGeneralConfigs()['sodvlt'] + 1;
                $modelconfig->save();
            }
            $this->congbo($input['idduyet']);

            return redirect('xetduyetkkgdvlt/'.$input['tt']);

        }else
            return view('errors.notlogin');
    }

    public function congbo($id){
        $modelkk = KkGDvLt::findOrFail($id);
        $modeldel = CbKkGDvLt::where('macskd',$modelkk->macskd)
            ->delete();
        $model = new CbKkGDvLt();
        $model->ngaynhap = $modelkk->ngaynhap;
        $model->mahs = $modelkk->mahs;
        $model->socv = $modelkk->socv;
        $model->ngayhieuluc = $modelkk->ngayhieuluc;
        $model->socvlk = $modelkk->socvlk;
        $model->ngaycvlk = $modelkk->ngaycvlk;
        $model->trangthai = 'Đang công bố';
        $model->macskd = $modelkk->macskd;
        $model->masothue = $modelkk->masothue;
        $model->ghichu = $modelkk->ghichu;
        $model->ngaynhan = $modelkk->ngaynhan;
        $model->sohsnhan = $modelkk->sohsnhan;
        $model->ngaychuyen = $modelkk->ngaychuyen;
        $model->ttnguoinop = $modelkk->ttnguoinop;
        $model->idkk = $modelkk->id;
        $model->save();
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

// <editor-fold defaultstate="collapsed" desc="--Thông tin doanh nghiệp- Cho doanh nghiệp tự cập nhật được thông tin của mình--">

    public function TtDnIndex(){
        if (Session::has('admin')) {

            $model = DnDvLt::where('masothue',session('admin')->mahuyen)
                ->first();

            return view('quanly.dvlt.ttdn.index')
                ->with('model',$model)
                ->with('pageTitle','Thông tin doanh nghiệp cung cấp dịch vụ lưu trú');

        }else
            return view('errors.notlogin');
    }

    public function TtDnEdit($id){
        if (Session::has('admin')) {

            $model = DnDvLt::findOrFail($id);

            return view('quanly.dvlt.ttdn.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tin doanh nghiệp cung cấp dịch vụ lưu trú');

        }else
            return view('errors.notlogin');
    }

    public function TtDnUpdate(Request $request,$id){
        if (Session::has('admin')) {
            $update = $request->all();

            $model = DnDvLt::findOrFail($id);
            $model->tendn = $update['tendn'];
            $model->diachidn = $update['diachidn'];
            $model->teldn = $update['teldn'];
            $model->faxdn = $update['faxdn'];
            $model->noidknopthue= $update['noidknopthue'];
            $model->chucdanhky = $update['chucdanhky'];
            $model->nguoiky = $update['nguoiky'];
            $model->diadanh = $update['diadanh'];
            $model->save();

            return redirect('ttdndvlt');

        }else
            return view('errors.notlogin');
    }
// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="--Thông tin cơ sở kinh doanh - 1 doanh nghiệp có thể có nhiều cơ sở kinh doanh--">

    public function TtCsKdIndex(){
        if (Session::has('admin')) {
            $modeldn = DnDvLt::where('masothue',session('admin')->mahuyen)
                ->first();
            $model = CsKdDvLt::where('masothue',session('admin')->mahuyen)
                ->get();

            return view('quanly.dvlt.ttcskd.index')
                ->with('modeldn',$modeldn)
                ->with('model',$model)
                ->with('pageTitle','Thông tin cơ sở kinh doanh cung cấp dịch vụ lưu trú');

        }else
            return view('errors.notlogin');
    }

    public function TtCsKdCreate(){
        if (Session::has('admin')) {
            $model = TtPhong::where('masothue',session('admin')->mahuyen)
                ->delete();
            return view('quanly.dvlt.ttcskd.create')
                ->with('pageTitle','Kê khai thông tin cơ sở kinh doanh cung cấp dịch vụ lưu trú');

        }else
            return view('errors.notlogin');
    }

    public function TtCsKdStore(Request $request){
        if (Session::has('admin')) {
            $now = getdate();
            $ma = session('admin')->mahuyen.'-'.$now['mday'].$now['mon'].$now['year'].$now['hours'].$now['minutes'].$now['seconds'];
            $insert = $request->all();

            $model = new CsKdDvLt();
            $model->macskd = $ma;
            $model->masothue = session('admin')->mahuyen;
            $model->tencskd = $insert['tencosokinhdoanh'];
            $model->loaihang = $insert['loaihang'];
            $model->diachikd = $insert['diachikinhdoanh'];
            $model->telkd = $insert['telephonekinhdoanh'];
            if($model->save())
                $this->StorePh($ma);

            return redirect('ttcskddvlt');
        }else
            return view('errors.notlogin');
    }

    public function StorePh($ma){
        $modelph = TtPhong::where('masothue',session('admin')->mahuyen)
            ->get();
        foreach($modelph as $ph){
            $model = new TtCsKdDvLt();
            $model->maloaip = $ph->maloaip;
            $model->loaip = $ph->loaip;
            $model->qccl = $ph->qccl;
            $model->sohieu = $ph->sohieu;
            $model->ghichu = $ph->ghichu;
            $model->macskd = $ma;
            $model->save();
        }
    }

    public function TtCsKdEdit($id){
        if (Session::has('admin')) {
            $model = CsKdDvLt::findOrFail($id);
            $modelph = TtCsKdDvLt::where('macskd',$model->macskd)
                ->get();

            return view('quanly.dvlt.ttcskd.edit')
                ->with('model',$model)
                ->with('modelph',$modelph)
                ->with('pageTitle','Chỉnh sửa thông tin cơ sở kinh doanh dịch vụ lưu trú');
        }else
            return view('errors.notlogin');
    }

    public function TtCsKdUpdate(Request $request, $id){
        if (Session::has('admin')) {
            $update = $request->all();
            $model = CsKdDvLt::findOrFail($id);
            $model->tencskd = $update['tencskd'];
            $model->loaihang = $update['loaihang'];
            $model->diachikd = $update['diachikd'];
            $model->telkd = $update['telkd'];
            $model->save();

            return redirect('ttcskddvlt');
        }else
            return view('errors.notlogin');
    }

// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="--Kê khai giá dịch vụ lưu trú--">
    public function KkGDvLtShow(){
        if (Session::has('admin')) {
            $modeldn = DnDvLt::where('masothue',session('admin')->mahuyen)
                ->first();
            $model = CsKdDvLt::where('masothue',session('admin')->mahuyen)
                ->get();

            return view('quanly.dvlt.kkgiadv.show')
                ->with('modeldn',$modeldn)
                ->with('model',$model)
                ->with('pageTitle','Thông tin cơ sở kinh doanh');

        }else
            return view('errors.notlogin');
    }

    public function KkGDvLtIndex($id){
        if (Session::has('admin')) {
            $modelcskd = CsKdDvLt::findOrFail($id);

            $model = KkGDvLt::where('macskd',$modelcskd->macskd)
                ->orderBy('id', 'esc')
                ->get();

            return view('quanly.dvlt.kkgiadv.index')
                ->with('modelcskd',$modelcskd)
                ->with('model',$model)
                ->with('pageTitle','Thông tin cơ sở kinh doanh');

        }else
            return view('errors.notlogin');
    }

    public function KkGDvLtCreate($id){
        if (Session::has('admin')) {
            $modelcskd = CsKdDvLt::findOrFail($id);
            $modelkkctdf = KkGDvLtCtDf::where('macskd',$modelcskd->macskd)
                ->delete();

            $modelph = TtCsKdDvLt::where('macskd',$modelcskd->macskd)
                ->get();
            //dd($modelph);

            $modelcb = CbKkGDvLt::where('macskd',$modelcskd->macskd)
                ->first();
            //dd($modelcb);
            if(isset($modelcb)) {
                $modelgcb  = KkGDvLtCt::where('mahs',$modelcb->mahs)
                    ->get();
                foreach ($modelph as $ph) {
                    foreach ($modelgcb as $giaph) {
                        if ($giaph->maloaip == $ph->maloaip) {
                            $ph->gialk = $giaph->mucgiakk;
                        }
                    }
                }
            }

            return view('quanly.dvlt.kkgiadv.create')
                ->with('modelcskd',$modelcskd)
                ->with('modelph',$modelph)
                ->with('modelcb',$modelcb)
                ->with('pageTitle','Kê khai giá dịch vụ lưu trú');

        }else
            return view('errors.notlogin');
    }

    public function KkGDvLtStore(Request $request,$id){
        if (Session::has('admin')) {
            $mahs = getdate()[0];
            $insert = $request->all();
            $model = new KkGDvLt();
            $model->ngaynhap = $insert['ngaynhap'];
            $model->mahs = $mahs;
            $model->socv = $insert['socv'];
            $model->ngayhieuluc = $insert['ngayhieuluc'];
            $model->socvlk = $insert['socvlk'];
            $model->ngaycvlk = $insert['ngaycvlk'];
            $model->trangthai = 'Chờ chuyển';
            $model->macskd = $insert['macskd'];
            $model->masothue = session('admin')->mahuyen;
            $model->ghichu = $insert['ghichu'];
            if($model->save()){
                $modelph = KkGDvLtCtDf::where('macskd',$insert['macskd'])
                    ->get();
                foreach($modelph as $ph){
                    $modelgiaph = new KkGDvLtCt();
                    $modelgiaph->maloaip = $ph->maloaip;
                    $modelgiaph->loaip = $ph->loaip;
                    $modelgiaph->qccl = $ph->qccl;
                    $modelgiaph->sohieu = $ph->sohieu;
                    $modelgiaph->ghichu = $ph->ghichu;
                    $modelgiaph->macskd = $ph->macskd;
                    $modelgiaph->mucgialk = $ph->mucgialk;
                    $modelgiaph->mucgiakk = $ph->mucgiakk;
                    $modelgiaph->mahs = $mahs;
                    $modelgiaph->save();
                }
            }

            return redirect('kkgdvlt/'.$id);//Truyền thêm id của CsKd và mã số cskd vào hidden trên Form để kéo về insert

        }else
            return view('errors.notlogin');
    }

    public function KkGDvLtEdit($idcskd,$id){
        if (Session::has('admin')) {
            $modelcskd = CsKdDvLt::where('id',$idcskd)
                ->first();
            $model = KkGDvLt::findOrFail($id);
            $modelgiaph = KkGDvLtCt::where('mahs',$model->mahs)
                ->get();

            return view('quanly.dvlt.kkgiadv.edit')
                ->with('model',$model)
                ->with('modelgiaph',$modelgiaph)
                ->with('modelcskd',$modelcskd)
                ->with('pageTitle','Chỉnh sửa kê khai giá dịch vụ lưu trú');

        }else
            return view('errors.notlogin');
    }

    public function KkGDvLtUpdate(Request $request,$idcskd,$id){
        if (Session::has('admin')) {
            $update = $request->all();

            $model = KkGDvLt::findOrFail($id);
            $model->ngaynhap = $update['ngaynhap'];
            $model->socv = $update['socv'];
            $model->ngayhieuluc = $update['ngayhieuluc'];
            $model->socvlk = $update['socvlk'];
            $model->save();

            return redirect('kkgdvlt/'.$idcskd);

        }else
            return view('errors.notlogin');
    }

    public function KkGDvLtDelete(Request $request,$id){
        if (Session::has('admin')) {
            $delete = $request->all();

            $model = KkGDvLt::where('id',$delete['iddelete'])->first();
            if($model->delete()){
                $modelgiaph = KkGDvLtCt::where('mahs',$model->mahs)->delete();
            }

            return redirect('kkgdvlt/'.$id);

        }else
            return view('errors.notlogin');
    }

    public function KkGDvLtChuyen(Request $request,$id){
        if (Session::has('admin')) {
            $input = $request->all();
            $tgchuyen = Carbon::now()->toDateTimeString();
            $model = KkGDvLt::where('id',$input['idchuyen'])->first();
            $model->ttnguoinop = $input['ttnguoinop'];
            $model->trangthai = 'Chờ duyệt';
            $model->ngaychuyen = $tgchuyen;
            $model->save();

            return redirect('kkgdvlt/'.$id);

        }else
            return view('errors.notlogin');
    }


// </editor-fold>

}
