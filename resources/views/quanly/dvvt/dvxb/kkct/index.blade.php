<?php
/**
 * Created by PhpStorm.
 * User: MyloveCoi
 * Date: 22/04/2016
 * Time: 2:59 PM
 */
        ?>

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

    <script>
        function confirmDelete(id) {
            document.getElementById("iddelete").value =id;
        }
    </script>
@stop

@section('content')
    <div class="page-content">
        <div id="" class="row">
            <div class="col-lg-12">
                <form>
                    <div class="portlet box">
                        <div class="portlet-header">
                            <div class="caption">
                                <b>BẢNG GIÁ DỊCH VỤ - {{$tendonvi}} - áp dụng từ ngày {{getDayVn($modelkk->ngayhieuluc)}}</b>
                            </div>
                            <div class="actions">
                                <a href="{{url('dvvantai/dvxb/print/'.$masokk)}}" target="_blank" class="btn btn-info"><i class="fa fa-print"></i> In kê khai </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="table_id"class="table table-hover table-striped table-bordered table-advanced tablesorter">
                                            <thead>
                                            <tr>
                                                <th style="width: 20%">Tên dịch vụ</th>
                                                <th style="width: 10%">Quy cách, chất lượng phòng</th>
                                                <th style="width: 10%">Mức giá kê khai hiện hành vé lượt</th>
                                                <th style="width: 10%">Mức giá kê khai mới vé lượt</th>
                                                <th style="width: 10%">Mức giá kê khai hiện hành vé tháng</th>
                                                <th style="width: 10%">Mức giá kê khai mới vé tháng</th>
                                                <th style="width: 10%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($model as $giadv)
                                                <tr>
                                                    <td>{{$giadv->tendichvu}}</td>
                                                    <td>{{$giadv->qccl}}</td>
                                                    <td>{{number_format($giadv->giakklkluot)}}</td>
                                                    <td>{{number_format($giadv->giakkluot)}}</td>
                                                    <td>{{number_format($giadv->giakklkthang)}}</td>
                                                    <td>{{number_format($giadv->giakkthang)}}</td>
                                                    <td>
                                                        @if(session('admin')->level == 'H')
                                                            @if($modelkk->trangthai == 'Chờ chuyển')
                                                                    <a href="{{url('dvvantai/dvxb/chitiet/edit/'.$giadv->id)}}" class="btn btn-info btn-xs mbs">&nbsp;Chỉnh sửa</a>
                                                                    <button type="button" onclick="confirmDelete('{{$giadv->id}}')" class="btn btn-danger btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal">
                                                                        <i class="fa fa-trash-o"></i>&nbsp; Xóa</button>
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            $('#frmDelete').attr('action', "/dvvantai/dvxb/chitiet/del/" + id);
        }
    </script>
    @include('includes.e.modal-confirm')
@stop


