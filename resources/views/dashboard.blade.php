@extends('main')

@section('custom-style')

@stop


@section('custom-script')

@stop

@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="portlet box">
                    <!--div class="portlet-header">

                    </div-->
                    <div class="portlet-body">
                        <div class="panel">
                            <div class="panel-body pan">
                                <div id="tab-general">
                                    <div class="row">
                                        <!--div class="col-lg-12">

                                            <div class="note note-info">
                                                <h4 class="box-heading">Thông báo</h4>
                                                <p>Dịch vụ lưu trú</p>
                                                <p>Dịch vụ vận tải</p>
                                            </div>

                                        </div-->
                                        <div class="col-lg-12">
                                            <div class="col-lg-3">
                                                <div class="list-group">
                                                    <li class="list-group-item active"><b>Dịch vụ lưu trú</b></li>
                                                    <li class="list-group-item">Chờ nhận<span
                                                                class="badge badge-info pull-right">{{number_format($hsltcn)}}</span></li>
                                                    <li class="list-group-item">Chờ duyệt<span
                                                                class="badge badge-info pull-right">{{number_format($hsltcd)}}</span></li>
                                                    <li class="list-group-item">Trả lại<span
                                                                class="badge badge-info pull-right">{{number_format($hslttl)}}</span></li>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="list-group">
                                                    <li class="list-group-item active"><b>Dịch vụ vận tải</b></li>
                                                    <li class="list-group-item">Chờ duyệt<span
                                                                class="badge badge-info pull-right">0</span></li>
                                                    <li class="list-group-item">Đã duyệt<span
                                                                class="badge badge-info pull-right">0</span></li>
                                                    <li class="list-group-item">Trả lại<span
                                                                class="badge badge-info pull-right">0</span></li>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop 