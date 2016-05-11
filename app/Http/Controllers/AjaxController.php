<?php

namespace App\Http\Controllers;

use App\TtCsKdDvLt;
use App\TtPhong;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AjaxController extends Controller
{
    //Tạo mới thông tin cơ sở kinh doanh
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

        if(isset($inputs['maloaip'])){
            $modelph = new TtPhong();
            $modelph->maloaip = $inputs['maloaip'];
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
                    $result['message'] .= '<td>'.$phong->maloaip.'</td>';
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
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Ký hiệu loại phòng<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="maloaipedit" id="maloaipedit" class="form-control" value="'.$model->maloaip.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
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

        if(isset($inputs['maloaip'])){
            $modelph = TtPhong:: where('id',$inputs['id'])->first();
            $modelph->maloaip = $inputs['maloaip'];
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
                    $result['message'] .= '<td>'.$phong->maloaip.'</td>';
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
                    $result['message'] .= '<td>'.$phong->maloaip.'</td>';
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
    //End Tạo thông tin phòng cơ sở quản lý

    //Chỉnh sửa thông tin cơ sở kinh doanh
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
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Ký hiệu loại phòng<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="maloaipedit" id="maloaipedit" class="form-control" value="'.$model->maloaip.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
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

        if(isset($inputs['maloaip'])){
            $modelph = TtCsKdDvLt:: where('id',$inputs['id'])->first();
            $modelph->maloaip = $inputs['maloaip'];
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
                    $result['message'] .= '<td>'.$phong->maloaip.'</td>';
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
                    $result['message'] .= '<td>'.$phong->maloaip.'</td>';
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

        if(isset($inputs['maloaip'])){
            $modelph = new TtCsKdDvLt();
            $modelph->maloaip = $inputs['maloaip'];
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
                    $result['message'] .= '<td>'.$phong->maloaip.'</td>';
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

    //End Chính sửa
}
