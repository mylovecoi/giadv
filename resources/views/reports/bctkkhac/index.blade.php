@extends('main')

@section('custom-style')
    <!-- put the custom style for this page here -->
    <link rel="stylesheet" href="{{ url('vendors/DataTables/media/css/jquery.dataTables.css') }}">
    <!-- <link rel="stylesheet" href="{{ url('vendors/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css') }}">-->
    <link rel="stylesheet" href="{{ url('vendors/DataTables/media/css/dataTables.bootstrap.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">

    <style>

        .ul-report li {
            margin-top: 7px;
        }

        .datepicker {
            z-index: 2000 !important;
        }

        a:hover{
            cursor: pointer;
        }
    </style>
@stop


@section('custom-script')
    <!-- put the custom script for this page here -->
    <script type="text/javascript" src="{{ url('vendors/DataTables/media/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/DataTables/media/js/dataTables.bootstrap.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ url('vendors/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script> -->
    <script type="text/javascript" src="{{ url('js/table-datatables.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/form-validation.js') }}"></script>

@stop

@section('content')
    <div class="page-content">
        <div id="" class="row">
            <div class="col-lg-12">
                <form id="view_user">
                    <div class="portlet box">
                        <div class="portlet-header">
                            <div class="caption">
                                <b>Báo cáo - thống kê khác</b>
                            </div>
                            <div class="actions">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="ul-report">
                                        <li><a data-target="#BC1-thoai-confirm" data-toggle="modal" data-href="{{url('reports/bctkkhac/BC1')}}">Báo cáo chi tiết kết quả thẩm định giá</a></li>
                                        <li><a data-target="#BC2-thoai-confirm" data-toggle="modal" data-href="{{url('reports/bctkkhac/BC2')}}">Báo cáo tổng hợp kết quả thẩm định giá</a></li>
                                        <li><a data-target="#BC3-thoai-confirm" data-toggle="modal" data-href="{{url('reports/bctkkhac/BC3')}}">Báo cáo chi tiết công bố giá và công bố giá bổ xung</a></li>
                                        <li><a data-target="#BC4-thoai-confirm" data-toggle="modal" data-href="{{url('reports/bctkkhac/BC4')}}">Báo cáo tổng hợp công bố giá và công bố giá bổ xung</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('reports.bctkkhac.thoai.modal-thoai')

@stop


