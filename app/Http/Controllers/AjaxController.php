<?php

namespace App\Http\Controllers;

use App\CbKkGDvLt;
use App\DnDvLt;
use App\DonViDvVt;
use App\KkGDvLt;
use App\KkGDvLtCt;
use App\KkGDvLtCtDf;
use App\TtCsKdDvLt;
use App\TtPhong;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AjaxController extends Controller
{


// <editor-fold defaultstate="collapsed" desc="--Tạo mới thông tin cơ sở kinh doanh DVLT--">
    public function createph(Request $request){
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
        //dd($request);
        $inputs = $request->all();

        if(isset($inputs['loaip'])){
            $modelph = new TtPhong();
            $modelph->maloaip = getdate()[0];
            $modelph->loaip = $inputs['loaip'];
            $modelph->qccl = $inputs['qccl'];
            $modelph->sohieu = $inputs['sohieu'];
            $modelph->ghichu = $inputs['ghichu'];
            $modelph->masothue = session('admin')->mahuyen;
            $modelph->save();

            $model = TtPhong::where('masothue',session('admin')->mahuyen)
                ->get();
            $result['message'] = '<tbody id="ttphong">';
            if(count($model) > 0){
                foreach($model as $phong){
                    $result['message'] .= '<tr>';
                    //$result['message'] .= '<td>'.$phong->maloaip.'</td>';
                    $result['message'] .= '<td>'.$phong->loaip.'</td>';
                    $result['message'] .= '<td>'.$phong->qccl.'</td>';
                    $result['message'] .= '<td>'.$phong->sohieu.'</td>';
                    $result['message'] .= '<td>'.$phong->ghichu.'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-wide-width" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('.$phong->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>&nbsp;'.
                        '<button type="button" class="btn btn-default btn-xs mbs" onclick="deleteRow('.$phong->id.')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'
                        .'</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['status'] = 'success';
            }
        }

        die(json_encode($result));
    }

    public function editph(Request $request){
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
        //dd($request);
        $inputs = $request->all();

        if(isset($inputs['id'])){

            $model = TtPhong::where('id',$inputs['id'])
                ->first();
            //dd($model);
            $result['message'] = '<div class="modal-body" id="ttphedit">';


            $result['message'] .= '<div class="row">';
            //$result['message'] .= '<div class="col-md-6">';
            //$result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Ký hiệu loại phòng<span class="require">*</span></label>';
            //$result['message'] .= '<div><input type="text" name="maloaipedit" id="maloaipedit" class="form-control" value="'.$model->maloaip.'"></div>';
            //$result['message'] .= '</div>';
            //$result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Loại phòng<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="loaipedit" id="loaipedit" class="form-control" value="'.$model->loaip.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Quy cách chất lượng<span class="require">*</span></label>';
            $result['message'] .= '<div><textarea id="qccledit" class="form-control" name="qccledit" cols="30" rows="3">'.$model->qccl.'</textarea></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Số hiệu<span class="require">*</span></label>';
            $result['message'] .= '<div><textarea id="sohieuedit" class="form-control" name="sohieuedit" cols="30" rows="3">'.$model->sohieu.'</textarea></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Ghi chú<span class="require">*</span></label>';
            $result['message'] .= '<div><textarea id="ghichuedit" class="form-control" name="ghichuedit" cols="30" rows="3">'.$model->ghichu.'</textarea></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<input type="hidden" id="idedit" name="idedit" value="'.$model->id.'">';


            $result['message'] .= '</div>';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }

    public function updateph(Request $request){
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
        //dd($request);
        $inputs = $request->all();

        if(isset($inputs['loaip'])){
            $modelph = TtPhong:: where('id',$inputs['id'])->first();
            //$modelph->maloaip = $inputs['maloaip'];
            $modelph->loaip = $inputs['loaip'];
            $modelph->qccl = $inputs['qccl'];
            $modelph->sohieu = $inputs['sohieu'];
            $modelph->ghichu = $inputs['ghichu'];
            //$modelph->masothue = session('admin')->mahuyen;
            $modelph->save();

            $model = TtPhong::where('masothue',session('admin')->mahuyen)
                ->get();
            $result['message'] = '<tbody id="ttphong">';
            if(count($model) > 0){
                foreach($model as $phong){
                    $result['message'] .= '<tr>';
                    //$result['message'] .= '<td>'.$phong->maloaip.'</td>';
                    $result['message'] .= '<td>'.$phong->loaip.'</td>';
                    $result['message'] .= '<td>'.$phong->qccl.'</td>';
                    $result['message'] .= '<td>'.$phong->sohieu.'</td>';
                    $result['message'] .= '<td>'.$phong->ghichu.'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-wide-width" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('.$phong->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>&nbsp;'.
                        '<button type="button" class="btn btn-default btn-xs mbs" onclick="deleteRow('.$phong->id.')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'
                        .'</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['status'] = 'success';
            }
        }

        die(json_encode($result));
    }

    public function deleteph(Request $request){
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
        //dd($request);
        $inputs = $request->all();

        if(isset($inputs['id'])){
            $modelph = TtPhong::where('id',$inputs['id'])->first();

            $modelph->delete();

            $model = TtPhong::where('masothue',session('admin')->mahuyen)
                ->get();
            $result['message'] = '<tbody id="ttphong">';
            if(count($model) > 0){
                foreach($model as $phong){
                    $result['message'] .= '<tr>';
                    //$result['message'] .= '<td>'.$phong->maloaip.'</td>';
                    $result['message'] .= '<td>'.$phong->loaip.'</td>';
                    $result['message'] .= '<td>'.$phong->qccl.'</td>';
                    $result['message'] .= '<td>'.$phong->sohieu.'</td>';
                    $result['message'] .= '<td>'.$phong->ghichu.'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-wide-width" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('.$phong->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>&nbsp;'.
                        '<button type="button" class="btn btn-default btn-xs mbs" onclick="deleteRow('.$phong->id.')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'
                        .'</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['status'] = 'success';
            }
        }

        die(json_encode($result));
    }
// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="--Chỉnh sửa thông tin cơ sở kinh doanh--">

    public function chinhsuaph(Request $request){
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
        //dd($request);
        $inputs = $request->all();

        if(isset($inputs['id'])){

            $model = TtCsKdDvLt::where('id',$inputs['id'])
                ->first();
            //dd($model);
            $result['message'] = '<div class="modal-body" id="ttphchinhsua">';


            $result['message'] .= '<div class="row">';
            //$result['message'] .= '<div class="col-md-6">';
            //$result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Ký hiệu loại phòng<span class="require">*</span></label>';
            //$result['message'] .= '<div><input type="text" name="maloaipedit" id="maloaipedit" class="form-control" value="'.$model->maloaip.'"></div>';
            //$result['message'] .= '</div>';
            //$result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Loại phòng<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="loaipedit" id="loaipedit" class="form-control" value="'.$model->loaip.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Quy cách chất lượng<span class="require">*</span></label>';
            $result['message'] .= '<div><textarea id="qccledit" class="form-control" name="qccledit" cols="30" rows="3">'.$model->qccl.'</textarea></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Số hiệu<span class="require">*</span></label>';
            $result['message'] .= '<div><textarea id="sohieuedit" class="form-control" name="sohieuedit" cols="30" rows="3">'.$model->sohieu.'</textarea></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Ghi chú<span class="require">*</span></label>';
            $result['message'] .= '<div><textarea id="ghichuedit" class="form-control" name="ghichuedit" cols="30" rows="3">'.$model->ghichu.'</textarea></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<input type="hidden" id="idedit" name="idedit" value="'.$model->id.'">';
            $result['message'] .= '<input type="hidden" id="macskd" name="macskd" value="'.$model->idcskddvlt.'">';


            $result['message'] .= '</div>';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }

    public function capnhatph(Request $request){
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
        //dd($request);
        $inputs = $request->all();

        if(isset($inputs['loaip'])){
            $modelph = TtCsKdDvLt:: where('id',$inputs['id'])->first();
            //$modelph->maloaip = $inputs['maloaip'];
            $modelph->loaip = $inputs['loaip'];
            $modelph->qccl = $inputs['qccl'];
            $modelph->sohieu = $inputs['sohieu'];
            $modelph->ghichu = $inputs['ghichu'];
            $modelph->save();

            $model = TtCsKdDvLt::where('macskd',$inputs['macskd'])
                ->get();
            //dd($model);
            $result['message'] = '<tbody id="ttphong">';
            if(count($model) > 0){
                foreach($model as $phong){
                    $result['message'] .= '<tr>';
                    //$result['message'] .= '<td>'.$phong->maloaip.'</td>';
                    $result['message'] .= '<td>'.$phong->loaip.'</td>';
                    $result['message'] .= '<td>'.$phong->qccl.'</td>';
                    $result['message'] .= '<td>'.$phong->sohieu.'</td>';
                    $result['message'] .= '<td>'.$phong->ghichu.'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-wide-width" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('.$phong->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>&nbsp;'.
                        '<button type="button" class="btn btn-default btn-xs mbs" onclick="deleteRow('.$phong->id.')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'
                        .'</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['status'] = 'success';
            }
        }

        die(json_encode($result));
    }

    public function xoaph(Request $request){
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
        //dd($request);
        $inputs = $request->all();
        //dd($inputs);

        if(isset($inputs['id'])){
            $modelph = TtCsKdDvLt::where('id',$inputs['id'])->first();
            //dd($modelph);
            if(isset($modelph))
                $modelph->delete();

            $model = TtCsKdDvLt::where('macskd',$inputs['macskd'])
                ->get();

            //dd($model);
            $result['message'] = '<tbody id="ttphong">';
            if(count($model) > 0){
                foreach($model as $phong){
                    $result['message'] .= '<tr>';
                    //$result['message'] .= '<td>'.$phong->maloaip.'</td>';
                    $result['message'] .= '<td>'.$phong->loaip.'</td>';
                    $result['message'] .= '<td>'.$phong->qccl.'</td>';
                    $result['message'] .= '<td>'.$phong->sohieu.'</td>';
                    $result['message'] .= '<td>'.$phong->ghichu.'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-wide-width" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('.$phong->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>&nbsp;'.
                        '<button type="button" class="btn btn-default btn-xs mbs" onclick="deleteRow('.$phong->id.')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'
                        .'</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['status'] = 'success';
            }
        }

        die(json_encode($result));
    }

    public function themmoiph(Request $request){
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
        //dd($request);
        $inputs = $request->all();

        if(isset($inputs['loaip'])){
            $modelph = new TtCsKdDvLt();
            //$modelph->maloaip = $inputs['maloaip'];
            $modelph->loaip = $inputs['loaip'];
            $modelph->qccl = $inputs['qccl'];
            $modelph->sohieu = $inputs['sohieu'];
            $modelph->ghichu = $inputs['ghichu'];
            $modelph->macskd = $inputs['macskd'];
            $modelph->save();

            $model = TtCsKdDvLt::where('macskd',$inputs['macskd'])
                ->get();
            $result['message'] = '<tbody id="ttphong">';
            if(count($model) > 0){
                foreach($model as $phong){
                    $result['message'] .= '<tr>';
                    //$result['message'] .= '<td>'.$phong->maloaip.'</td>';
                    $result['message'] .= '<td>'.$phong->loaip.'</td>';
                    $result['message'] .= '<td>'.$phong->qccl.'</td>';
                    $result['message'] .= '<td>'.$phong->sohieu.'</td>';
                    $result['message'] .= '<td>'.$phong->ghichu.'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-wide-width" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('.$phong->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>&nbsp;'.
                        '<button type="button" class="btn btn-default btn-xs mbs" onclick="deleteRow('.$phong->id.')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'
                        .'</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['status'] = 'success';
            }
        }

        die(json_encode($result));
    }
// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="--Chỉnh sửa giá phòng--">
    public function editgiaph(Request $request){
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
        //dd($request);
        $inputs = $request->all();

        if(isset($inputs['id'])){
            $modelph = TtCsKdDvLt::where('id',$inputs['id'])
                ->first();
            $modelgiakk = KkGDvLtCtDf::where('macskd',$modelph->macskd)
                ->where('maloaip',$modelph->maloaip)
                ->first();
            if(isset($modelgiakk)){
                $mucgiakk = $modelgiakk->mucgiakk;
                $mucgialk = $modelgiakk->mucgialk;
            }else{
                $modelcb = CbKkGDvLt::where('macskd',$modelph->macskd)
                    ->first();
                if(isset($modelcb)){
                    $modelcbgia = KkGDvLtCt::where('mahs',$modelcb->mahs)
                        ->where('maloaip',$modelph->maloaip)
                        ->first();
                    $mucgialk = $modelcbgia->mucgiakk;
                    $mucgiakk = 0;
                }else {
                    $mucgiakk = 0;
                    $mucgialk = 0;
                }
            }

            $result['message'] = '<div class="form-horizontal" id="ttgiaph">';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-4 control-label"><b>Mức giá kê khai liền kê</b></label>';
            $result['message'] .= '<div class="col-md-6 ">';
            $result['message'] .= '<input type="text" id="mucgialk" name="mucgialk" class="form-control" data-mask="fdecimal" value="'.$mucgialk.'" autofocus>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-4 control-label"><b>Mức giá kê khai </b></label>';
            $result['message'] .= '<div class="col-md-6 ">';
            $result['message'] .= '<input type="text" id="mucgiakk" name="mucgiakk" class="form-control" data-mask="fdecimal" value="'.$mucgiakk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<input type="hidden" id="idedit" name="idedit" value="'.$modelph->id.'">';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }

    public function updategiaph(Request $request){
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
        //dd($request);
        $inputs = $request->all();

        $inputs['mucgialk'] = str_replace(',','',$inputs['mucgialk']);
        $inputs['mucgialk'] = str_replace('.','',$inputs['mucgialk']);
        $inputs['mucgiakk'] = str_replace(',','',$inputs['mucgiakk']);
        $inputs['mucgiakk'] = str_replace('.','',$inputs['mucgiakk']);

        if(isset($inputs['id'])){
            $modelph = TtCsKdDvLt:: where('id',$inputs['id'])->first();

            $modelgiaph = new KkGDvLtCtDf();
            $modelgiaph->maloaip = $modelph->maloaip;
            $modelgiaph->loaip = $modelph->loaip;
            $modelgiaph->qccl = $modelph->qccl;
            $modelgiaph->sohieu = $modelph->sohieu;
            $modelgiaph->ghichu = $modelph->ghichu;
            $modelgiaph->macskd = $modelph->macskd;
            $modelgiaph->mucgialk = $inputs['mucgialk'];
            $modelgiaph->mucgiakk = $inputs['mucgiakk'];
            $modelgiaph->save();

            $model = TtCsKdDvLt::where('macskd',$modelph->macskd)
                ->get();
            $modelgiaphtam = KkGDvLtCtDf::where('macskd',$modelph->macskd)
                ->get();
            foreach($model as $ph){
                $this->getGiaphtam($modelgiaphtam,$ph);
            }
            //dd($model);

            $result['message'] = '<tbody id="ttphong">';
            if(count($model) > 0){
                foreach($model as $phong){
                    $result['message'] .= '<tr>';
                    $result['message'] .= '<td>'.$phong->loaip.'-'.$phong->qccl.'</td>';
                    $result['message'] .= '<td>'.$phong->sohieu.'</td>';
                    $result['message'] .= '<td>'.number_format($phong->mucgialk).'</td>';
                    $result['message'] .= '<td>'.number_format($phong->mucgiakk).'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-create" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('.$phong->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá</button>'
                        .'</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['status'] = 'success';
            }
        }

        die(json_encode($result));
    }

    public function getGiaphtam($phs,$array){
        foreach($phs as $ph){
            if($ph->maloaip == $array->maloaip){
                $array->mucgiakk = $ph->mucgiakk;
                $array->mucgialk = $ph->mucgialk;
            }
        }

    }

    public function chinhsuagiaph(Request $request){
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
        //dd($request);
        $inputs = $request->all();

        if(isset($inputs['id'])){
            $modelgiaph = KkGDvLtCt::where('id',$inputs['id'])
                ->first();

            $result['message'] = '<div class="form-horizontal" id="ttgiaph">';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-4 control-label"><b>Mức giá kê khai liền kê</b></label>';
            $result['message'] .= '<div class="col-md-6 ">';
            $result['message'] .= '<input type="text" id="mucgialk" name="mucgialk" class="form-control" data-mask="fdecimal" value="'.$modelgiaph->mucgialk.'" autofocus>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-4 control-label"><b>Mức giá kê khai </b></label>';
            $result['message'] .= '<div class="col-md-6 ">';
            $result['message'] .= '<input type="text" id="mucgiakk" name="mucgiakk" class="form-control" data-mask="fdecimal" value="'.$modelgiaph->mucgiakk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<input type="hidden" id="idct" name="idct" value="'.$modelgiaph->id.'">';
            $result['message'] .= '<input type="hidden" id="mahsct" name="mahsct" value="'.$modelgiaph->mahs.'">';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }

    public function capnhatgiaph(Request $request){
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
        $inputs['mucgialk'] = str_replace(',','',$inputs['mucgialk']);
        $inputs['mucgialk'] = str_replace('.','',$inputs['mucgialk']);
        $inputs['mucgiakk'] = str_replace(',','',$inputs['mucgiakk']);
        $inputs['mucgiakk'] = str_replace('.','',$inputs['mucgiakk']);

        if(isset($inputs['id'])){
            $modelgiaph = KkGDvLtCt::where('id',$inputs['id'])
                ->first();
            $modelgiaph->mucgialk = $inputs['mucgialk'];
            $modelgiaph->mucgiakk = $inputs['mucgiakk'];
            $modelgiaph->save();

            $model = KkGDvLtCt::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<tbody id="ttphong">';
            if(count($model) > 0){
                foreach($model as $phong){
                    $result['message'] .= '<tr>';
                    $result['message'] .= '<td>'.$phong->loaip.'-'.$phong->qccl.'</td>';
                    $result['message'] .= '<td>'.$phong->sohieu.'</td>';
                    $result['message'] .= '<td>'.number_format($phong->mucgialk).'</td>';
                    $result['message'] .= '<td>'.number_format($phong->mucgiakk).'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-create" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('.$phong->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá</button>'
                        .'</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['status'] = 'success';
            }
        }

        die(json_encode($result));
    }


// </editor-fold>

//<editor-fold defaultstate="collapsed" desc="--View lý do ko duyệt dịch vụ lưu trú--">
    public function viewlydo(Request $request){
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
        //dd($request);
        $inputs = $request->all();

        if(isset($inputs['id'])){
            $model = KkGDvLt::where('id',$inputs['id'])
                ->first();

            //$result['message'] = '<div class="col-md-9 " id="ndlydo">';
            $result['message'] = '<textarea id="lydo" class="form-control required" name="lydo" cols="30" rows="6">'.$model->lydo.'</textarea>';
            //$result['message'] .= '</div>';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }

//</editor-fold>

    public function getTTdn(Request $request){
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
        //dd($request);
        $inputs = $request->all();
        //dd($inputs);

        if(isset($inputs['loaidv'])){
            if($inputs['loaidv'] == 'dvlt'){
                $model = DnDvLt::all();
                $result['message'] = '<select id="mahuyen" class="form-control" name="mahuyen">';
                $result['message'] .='<option value="" selected="selected">-- Chọn doanh nghiệp --</option>';
                if(count($model) > 0){
                    foreach($model as $dn){
                        $result['message'] .= '<option value="'.$dn->masothue.'">'.$dn->tendn.'</option>';
                    }
                    $result['message'] .= '</select>';
                    $result['status'] = 'success';
                }
            }
            else{
                $model = DonViDvVt::all();
                //dd($model);
                $result['message'] = '<select id="mahuyen" class="form-control" name="mahuyen">';
                $result['message'] .='<option value="" selected="selected">-- Chọn doanh nghiệp --</option>';
                if(count($model) > 0){
                    foreach($model as $dn){
                        $result['message'] .= '<option value="'.$dn->masothue.'">'.$dn->tendonvi.'</option>';
                    }
                    $result['message'] .= '</select>';
                    $result['status'] = 'success';
                }
            }
            //dd($result['message']);

        }

        die(json_encode($result));
    }




}
