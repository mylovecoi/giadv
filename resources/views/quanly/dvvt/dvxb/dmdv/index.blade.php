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
            $('#frmDelete').attr('action', "deldv/" + id);
        }
    </script>

@stop

@section('content')
    <div class="page-content">
        <div id="" class="row">
            <div class="col-lg-12">
                <form id="view_user">
                    <div class="portlet box">
                        <div class="portlet-header">
                            <div class="caption">
                                <b>THÔNG TIN DỊCH VỤ VẬN TẢI HÀNH KHÁCH BẰNG XE BUÝT</b>
                            </div>
                            <div class="actions">
                                <a href="{{url('dvvantai/dvxb/danhmuc/create')}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Thêm mới</a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="table_id"class="table table-hover table-striped table-bordered table-advanced tablesorter">
                                            <thead>
                                            <tr>
                                                <th style="width: 1%; padding: 10px; background: #efefef"><input type="checkbox" class="checkall"/></th>
                                                <th style="width: 10%">Mã dịch vụ</th>
                                                <th style="width: 20%">Tên dịch vụ</th>
                                                <th style="width: 15%">Quy cách chất lượng phòng</th>
                                                <th style="width: 10%">Đơn vị tính lượt</th>
                                                <th style="width: 10%">Đơn vị tính tháng</th>
                                                <th style="width: 20%">Ghi chú</th>
                                                <th style="width: 10%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($model as $dv)
                                                <tr>
                                                    <td><input type="checkbox" type="checkbox" name = "ck_value"  id="ck_value" value="{{$dv->id}}"/></td>
                                                    <td>{{$dv->madichvu}}</td>
                                                    <td>{{$dv->tendichvu}}</td>
                                                    <td>{{$dv->qccl}}</td>
                                                    <td>{{$dv->dvtluot}}</td>
                                                    <td>{{$dv->dvtthang}}</td>
                                                    <td>{!!nl2br($dv->ghichu)!!}</td>
                                                    <td>
                                                        <a href="{{url('dvvantai/dvxb/danhmuc/'.$dv->id.'/edit')}}" class="btn btn-info btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>

                                                        <button type="button" onclick="confirmDelete('{{$dv->id}}')" class="btn btn-danger btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                                            Xóa</button>
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

    @include('includes.e.modal-confirm')

@stop


