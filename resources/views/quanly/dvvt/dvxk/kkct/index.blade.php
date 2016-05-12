<?php
/**
 * Created by PhpStorm.
 * User: MyloveCoi
 * Date: 18/04/2016
 * Time: 2:51 PM
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
                                <b>BẢNG GIÁ DỊCH VỤ - {{$modeldonvi->tendonvi}} - áp dụng từ ngày {{getDayVn($modelkk->ngayhieuluc)}}</b>
                            </div>
                            <div class="actions">
                                <a href="{{url('dvvantai/kkdvxkct/print/'.$modelkk->id)}}" target="_blank" class="btn btn-info"><i class="fa fa-print"></i> In kê khai </a>
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
                                                <th style="width: 10%">Đơn vị tính</th>
                                                <th style="width: 10%">Mức giá kê khai hiện hành</th>
                                                <th style="width: 10%">Mức giá kê khai mới</th>
                                                <th style="width: 10%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($model as $giadv)
                                                <tr>
                                                    <td>{{$giadv->tendichvu}}</td>
                                                    <td>{{$giadv->qccl}}</td>
                                                    <td>{{$giadv->dvt}}</td>
                                                    <td>{{number_format($giadv->giakklk)}}</td>
                                                    <td>{{number_format($giadv->giakk)}}</td>
                                                    <td>
                                                        @if(session('admin')->level == 'H')
                                                            @if($modelkk->trangthai == 'Chờ chuyển')
                                                                @if(isset($giadv->idgia))
                                                                    <a href="{{url('dvvantai/kkdvxkct/'.$modelkk->id.'/'.$giadv->idgia.'/edit')}}" class="btn btn-info btn-xs mbs">&nbsp;Chỉnh sửa</a>

                                                                    <button type="button" onclick="confirmDelete('{{$giadv->idgia}}')" class="btn btn-danger btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal">
                                                                        <i class="fa fa-trash-o"></i>&nbsp; Xóa</button>
                                                                @else
                                                                    <a href="{{url('dvvantai/kkdvxkct/create/'.$modelkk->id.'/'.$giadv->madichvu)}}" class="btn btn-success btn-xs mbs"><i class="fa fa-plus"></i>&nbsp;Nhập giá</a>
                                                                @endif
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

    <!--Modal Delete-->
    <div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'dvvantai/kkdvxkct/del/'.$modelkk->id,'id' => 'frm_delete','files'=>true, 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý xoá?</h4>
                </div>
                <input type="hidden" name="iddelete" id="iddelete" value="">
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickDelete()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script>
        function ClickDelete(){
            $('#frm_delete').submit();
        }
    </script>
@stop


