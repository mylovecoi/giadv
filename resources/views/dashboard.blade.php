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
                                        <div class="col-lg-12">
                                            @if(can('dvlt','index'))
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
                                            @endif
                                            @if(can('dvvt','index'))
                                                @if(session('admin')->level == 'T' || session('ttdnvt')->dvxk == 1)
                                            <div class="col-lg-3">
                                                <div class="list-group">
                                                    <li class="list-group-item active"><b>Dịch vụ vận tải xe khách</b></li>
                                                    <li class="list-group-item">Chờ duyệt<span
                                                                class="badge badge-info pull-right">{{number_format($hsxkcn)}}</span></li>
                                                    <li class="list-group-item">Chờ duyệt<span
                                                                class="badge badge-info pull-right">{{number_format($hsxkcd)}}</span></li>
                                                    <li class="list-group-item">Trả lại<span
                                                                class="badge badge-info pull-right">{{number_format($hsxktl)}}</span></li>
                                                </div>
                                            </div>
                                                @endif
                                                @if(session('admin')->level == 'T' || session('ttdnvt')->dvxb == 1)
                                            <div class="col-lg-3">
                                                <div class="list-group">
                                                    <li class="list-group-item active"><b>Dịch vụ vận tải xe buýt</b></li>
                                                    <li class="list-group-item">Chờ duyệt<span
                                                                class="badge badge-info pull-right">{{number_format($hsxbcn)}}</span></li>
                                                    <li class="list-group-item">Chờ duyệt<span
                                                                class="badge badge-info pull-right">{{number_format($hsxbcd)}}</span></li>
                                                    <li class="list-group-item">Trả lại<span
                                                                class="badge badge-info pull-right">{{number_format($hsxbtl)}}</span></li>
                                                </div>
                                            </div>
                                                @endif
                                                @if(session('admin')->level == 'T' || session('ttdnvt')->dvxtx == 1)
                                            <div class="col-lg-3">
                                                <div class="list-group">
                                                    <li class="list-group-item active"><b>Dịch vụ vận tải xe taxi</b></li>
                                                    <li class="list-group-item">Chờ duyệt<span
                                                                class="badge badge-info pull-right">{{number_format($hsxtxcn)}}</span></li>
                                                    <li class="list-group-item">Chờ duyệt<span
                                                                class="badge badge-info pull-right">{{number_format($hsxtxcd)}}</span></li>
                                                    <li class="list-group-item">Trả lại<span
                                                                class="badge badge-info pull-right">{{number_format($hsxtxtl)}}</span></li>
                                                </div>
                                            </div>
                                                @endif
                                                @if(session('admin')->level == 'T' || session('ttdnvt')->dvk == 1)
                                            <div class="col-lg-3">
                                                <div class="list-group">
                                                    <li class="list-group-item active"><b>Dịch vụ vận tải chở hàng</b></li>
                                                    <li class="list-group-item">Chờ duyệt<span
                                                                class="badge badge-info pull-right">{{number_format($hschcn)}}</span></li>
                                                    <li class="list-group-item">Chờ duyệt<span
                                                                class="badge badge-info pull-right">{{number_format($hschcd)}}</span></li>
                                                    <li class="list-group-item">Trả lại<span
                                                                class="badge badge-info pull-right">{{number_format($hschtl)}}</span></li>
                                                </div>
                                            </div>
                                                @endif
                                            @endif
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