@extends('main')

@section('custom-style')
    <!-- put the custom style for this page here -->
@stop


@section('custom-script')
    <!-- put the custom script for this page here -->
@stop

@section('content')
    <div class="page-content">
        <div id="" class="row">
            <div class="col-lg-12">
                <form id="view_general">
                    <div class="portlet box">
                        <div class="portlet-header">
                            <div class="caption">
                                <b>Thông tin cấu hình hệ thống</b>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="list-group">
                                        <li class="list-group-item"><b>Mã quan hệ ngân sách:&nbsp;</b>{{$model->maqhns}}</li>
                                        <li class="list-group-item"><b>Đơn vị:&nbsp;</b>{{$model->tendonvi}}</li>
                                        <li class="list-group-item"><b>Địa chỉ:&nbsp;</b>{{$model->diachi}}</li>
                                        <li class="list-group-item"><b>Số điện thoại:&nbsp;</b>{{$model->teldv}}</li>
                                        <li class="list-group-item"><b>Số hồ sơ dịch vụ lưu trú đã nhân:&nbsp;</b>{{$model->sodvlt}}</li>
                                        <li class="list-group-item"><b>Số hồ sơ dịch vụ vận tải đã nhận:&nbsp;</b>{{$model->sodvvt}}</li>
                                        <li class="list-group-item"><b>Thông tin liên hệ:&nbsp;</b><br>{!! nl2br(e($model->ttlh)) !!}</li>
                                        <!--li class="list-group-item"><b>Thủ trưởng đơn vị:&nbsp;</b>{{$model->thutruong}}</li>
                                        <li class="list-group-item"><b>Kế toán:&nbsp;</b>{{$model->ketoan}}</li>
                                        <li class="list-group-item"><b>Người lập biểu:&nbsp;</b>{{$model->nguoilapbieu}}</li>
                                        <li class="list-group-item"><b>Năm quản lý:&nbsp;</b>{{$model->namhethong}}</li-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('general/'. $model->id .'/edit')}}" class="btn btn-success">
                            <i class="fa fa-check"></i> Cập nhật</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop