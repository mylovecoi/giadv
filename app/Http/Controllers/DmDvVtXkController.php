<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DmDvVtXk;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmDvVtXkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('admin')) {

            $model = DmDvVtXk::where('masothue',session('admin')->mahuyen)->get();

            return view('quanly.dvvt.dvxk.dmdv.index')
                ->with('model',$model)
                ->with('pageTitle','Danh mục dịch vụ vận tải');

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

            return view('quanly.dvvt.dvxk.dmdv.create')
                ->with('pageTitle','Thêm mới dịch vụ vận tải');

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
            $insert = $request->all();
            $model = new DmDvVtXk();
            $model->madichvu = $insert['madichvu'];
            $model->tendichvu = $insert['tendichvu'];
            $model->qccl = $insert['qccl'];
            $model->dvt = $insert['dvt'];
            $model->ghichu = $insert['ghichu'];
            $model->masothue = session('admin')->mahuyen;
            $model->save();

            return redirect('dvvantai/dvxekhach');

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

            $model = DmDvVtXk::findOrFail($id);

            return view('quanly.dvvt.dvxk.dmdv.edit')
                ->with('model',$model)
                ->with('pageTitle','Chỉnh sửa thông tin dịch vụ vận tải');

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

            $model = DmDvVtXk::findOrFail($id);
            $model->madichvu = $update['madichvu'];
            $model->tendichvu = $update['tendichvu'];
            $model->qccl = $update['qccl'];
            $model->dvt = $update['dvt'];
            $model->ghichu = $update['ghichu'];
            $model->save();

            return redirect('dvvantai/dvxekhach');

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
            $model = DmDvVtXk::findOrFail($id);
            $model->delete();

            return redirect('dvvantai/dvxekhach');

        }else
            return view('errors.notlogin');
    }

    public function chkDvXk($masothue,$madichvu){
        $obj=DmDvVtXk::where('madichvu',$madichvu)
            ->where('masothue',$masothue)
            ->first();
        if($obj){
            echo 'duplicate';
        }else{
            echo 'ok';
        }
    }

    function AddDM(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        $inputs = $request->all();
        if (!isset($inputs['id'])) {
            die(json_encode($result));
        }
        //Thêm mới dịch vụ
        if ($inputs['id'] == 0) {
            $model = new DmDvVtXk();
            $model->masothue = session('admin')->mahuyen;
            $model->madichvu = 'DVXK'.session('admin')->mahuyen . getdate()[0];
            $model->diemdau = $inputs['diemdau'];
            $model->diemcuoi = $inputs['diemcuoi'];
            $model->tendichvu = $inputs['tendichvu'];
            $model->dvt = $inputs['dvt'];
            $model->loaixe = $inputs['loaixe'];
            $model->qccl = $inputs['qccl'];
            $model->ghichu = $inputs['ghichu'];
            $model->save();
        } else {
            $id=$inputs['id'];
            $model =  DmDvVtXk::findOrFail($id);
            $model->diemdau = $inputs['diemdau'];
            $model->diemcuoi = $inputs['diemcuoi'];
            $model->tendichvu = $inputs['tendichvu'];
            $model->dvt = $inputs['dvt'];
            $model->loaixe = $inputs['loaixe'];
            $model->qccl = $inputs['qccl'];
            $model->ghichu = $inputs['ghichu'];
            $model->save();
        }

        //Trả lại kết quả
        $result['message'] = '<tbody id="noidung">';
        $DMDV = DmDvVtXk::where('masothue', session('admin')->mahuyen)->get();

        if (count($DMDV) > 0) {
            foreach ($DMDV as $dv) {
                $result['message'] .= '<tr>';
                $result['message'] .= '<td name="loaixe">' . $dv->loaixe . '</td>';
                $result['message'] .= '<td name="diemdau">' . $dv->diemdau . '</td>';
                $result['message'] .= '<td name="diemcuoi">' . $dv->diemcuoi . '</td>';
                $result['message'] .= '<td name="tendichvu">' . $dv->tendichvu . '</td>';
                $result['message'] .= '<td name="qccl">' . $dv->qccl . '</td>';
                $result['message'] .= '<td name="dvt">' . $dv->dvt . '</td>';
                $result['message'] .= '<td name="ghichu">' . $dv->ghichu . '</td>';
                $result['message'] .= '<td>' .
                                        '<button type="button" class="btn btn-default btn-xs mbs" onclick="editDVXK(this,'.$dv->id.')"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>' .
                                        '<button type="button" onclick="confirmDelete(' . $dv->id . ')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>' .
                                    '</td>';
                $result['message'] .= '</tr>';
            }
        }
        $result['message'] .= '</tbody>';
        $result['status'] = 'success';

        die(json_encode($result));
    }
}
