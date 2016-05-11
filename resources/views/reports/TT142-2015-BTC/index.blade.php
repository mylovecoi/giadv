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
                                <b>Thông tư 142/2015/TT-BTC ngày 04 tháng 09 năm 2015</b>
                            </div>
                            <div class="actions">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="ul-report">
                                        <li><a data-target="#pl2-thoai-confirm" data-toggle="modal" data-href="{{url('reports/TT142/PL2')}}">Phụ lục 2- Thông tin về giá hàng hóa, dịch vụ</a> </li>
                                        <li><a data-target="#pl3-thoai-confirm" data-toggle="modal" data-href="{{url('reports/TT142/PL3')}}">Phụ lục 3- Thông tin về trị giá hàng hóa xuất khẩu</a> </li>
                                        <li><a data-target="#pl4-thoai-confirm" data-toggle="modal" data-href="{{url('reports/TT142/PL4')}}">Phụ lục 4- Thông tin về trị giá hàng hóa nhập khẩu</a> </li>
                                        <li><a data-target="#pl5-thoai-confirm" data-toggle="modal" data-href="{{url('reports/TT142/PL5')}}">Phụ lục 5- Thông tin về tài sản thẩm định giá</a> </li>
                                        <li><a target="_blank" href="{{url('reports/TT142/PL6')}}">Phụ lục 6- Thông tin về giá tài sản thuộc sở hữu nhà nước (Tài sản là nhà, đất)</a> </li>
                                        <li><a target="_blank" href="{{url('reports/TT142/PL7')}}">Phụ lục 7- Thông tin về giá tài sản thuộc sở hữu nhà nước (Tài sản là ôtô, tài sản khác)</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('reports.TT142-2015-BTC.thoai.modal-thoai')

@stop


