@extends('main')

@section('custom-style')
    <!-- put the custom style for this page here -->
    <link rel="stylesheet" href="{{ url('vendors/DataTables/media/css/jquery.dataTables.css') }}">
    <!-- <link rel="stylesheet" href="{{ url('vendors/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css') }}">-->
    <link rel="stylesheet" href="{{ url('vendors/DataTables/media/css/dataTables.bootstrap.css') }}">

@stop

@section('custom-script')
    <!-- put the custom script for this page here -->
    <script type="text/javascript" src="{{ url('vendors/DataTables/media/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/DataTables/media/js/dataTables.bootstrap.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ url('vendors/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script> -->
    <script type="text/javascript" src="{{ url('js/table-datatables.js') }}"></script>

@stop

@section('content')
    <div class="page-content">
        <div id="" class="row">
            <div class="col-lg-12">
                <form id="view_general">
                    <div class="portlet box">
                        <div class="portlet-header">
                            <div class="caption">
                                <b>Thông tin doanh nghiệp</b>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="list-group">
                                        <li class="list-group-item"><b>Tên doanh nghiệp:&nbsp;</b>{{$model->tendonvi}}</li>
                                        <li class="list-group-item"><b>Mã số thuế:&nbsp;</b>{{$model->masothue}}</li>
                                        <li class="list-group-item"><b>Địa chỉ trụ sở chính:&nbsp;</b>{{$model->diachi}}</li>
                                        <li class="list-group-item"><b>Điện thoại trụ sở chính:&nbsp;</b>{{$model->dienthoai}}</li>
                                        <li class="list-group-item"><b>Số fax trụ sở chính:&nbsp;</b>{{$model->fax}}</li>
                                        <li class="list-group-item"><b>Nơi đăng ký nộp thuế:&nbsp;</b>{{$model->dknopthue}}</li>
                                        <li class="list-group-item"><b>Giấy phép kinh doanh:&nbsp;</b>{{$model->giayphepkd}}</li>
                                        <li class="list-group-item"><b>Chức danh người ký:&nbsp;</b>{{$model->chucdanh}}</li>
                                        <li class="list-group-item"><b>Họ và tên người ký:&nbsp;</b>{{$model->nguoiky}}</li>
                                        <li class="list-group-item"><b>Địa danh:&nbsp;</b>{{$model->diadanh}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('dvvantai/ttdv/edit/'.$model->id)}}" class="btn btn-success">
                            <i class="fa fa-check"></i> Cập nhật</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop


