<?php
/**
 * Created by PhpStorm.
 * User: MyloveCoi
 * Date: 18/04/2016
 * Time: 10:43 AM
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
            $('#frmDelete').attr('action', "dvvantai/thaotackkdvxk/delete/" + id);
        }
        function confirmChuyen(id) {
            $('#frmChuyen').attr('action', "dvvantai/thaotackkdvxk/chuyen/" + id);
        }
        function confirmTraLai(id) {
            $('#frmTraLai').attr('action', "dvvantai/thaotackkdvxk/tralai/" + id);
        }
        function  getSelectedCheckboxes(){

            var ids = '';
            $.each($("input[name='ck_value']:checked"), function(){
                ids += ($(this).attr('value')) + '-';
            });
            return ids = ids.substring(0, ids.length - 1);

        }

        function multiDuyet() {

            var ids = getSelectedCheckboxes();
            if(ids == '') {
                $('#btnMultiDuyet').attr('data-target', '#notid-modal-confirm');
            }else {

                $('#btnMultiDuyet').attr('data-target', '#duyet-modal-confirm');
                $('#frmDuyet').attr('action', "{{ url('dvvantai/thaotackkdvxk/duyet')}}/" + ids);
            }

        }
        function multiBoDuyet() {

            var ids = getSelectedCheckboxes();
            if(ids == '') {
                $('#btnMultiBoDuyet').attr('data-target', '#notid-modal-confirm');
            }else {

                $('#btnMultiBoDuyet').attr('data-target', '#boduyet-modal-confirm');
                $('#frmBoDuyet').attr('action', "{{ url('dvvantai/thaotackkdvxk/boduyet')}}/" + ids);
            }

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
                            <div class="caption" style="text-transform:uppercase" >
                                <b>KÊ KHAI GIÁ DỊCH VỤ VẬN TẢI BẰNG Ô TÔ THEO TUYẾN CỐ ĐỊNH</b>
                            </div>
                            <div class="actions">
                                @if(session('admin')->level == 'H')
                                    <a href="{{url('dvvantai/kkdvxk/create')}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Kê khai mới</a>
                                @else
                                    <button id="btnMultiDuyet" type="button" onclick="multiDuyet()" class="btn btn-warning btn-xs" data-target="#duyet-modal-confirm" data-toggle="modal"><i class="fa fa-check-square-o"></i>&nbsp;
                                        Duyệt</button>
                                    <button id="btnMultiBoDuyet" type="button" onclick="multiBoDuyet()" class="btn btn-pink btn-xs" data-target="#boduyet-modal-confirm" data-toggle="modal"><i class="fa fa-square-o"></i>&nbsp;
                                        Bỏ duyệt</button>
                                @endif
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
                                                <th>Tên đơn vị</th>
                                                <th>Ngày kê khai</th>
                                                <th>Số công văn</th>
                                                <th>Áp dụng từ ngày</th>
                                                <th>Ngày nhận hồ sơ</th>
                                                <th>Người nộp</th>
                                                <th>Ghi chú</th>
                                                <th style="width: 5%">Trạng thái</th>
                                                <th style="width: 15%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($model as $kk)
                                                <tr>
                                                    <td><input type="checkbox" type="checkbox" name = "ck_value"  id="ck_value" value="{{$kk->id}}"/></td>
                                                    <td>{{$kk->tendonvi}}</td>
                                                    <td>{{getDayVn($kk->ngaynhap)}}</td>
                                                    <td>{{$kk->socv}}</td>
                                                    <td>{{getDayVn($kk->ngayhieuluc)}}</td>
                                                    <td>{{getDayVn($kk->ngaynhan)=='01/01/1970'?'':getDayVn($kk->ngaynhan)}}</td>
                                                    <td>{{$kk->nguoinop}}</td>
                                                    <td>{!! nl2br(e($kk->ghichu)) !!}</td>
                                                    @if($kk->trangthai == "Chờ chuyển")
                                                        <td align="center"><span class="badge badge-warning">{{$kk->trangthai}}</span></td>
                                                    @elseif($kk->trangthai == 'Chờ duyệt')
                                                        <td align="center"><span class="badge badge-danger">{{$kk->trangthai}}</span></td>
                                                    @else
                                                        <td align="center"><span class="badge badge-success">{{$kk->trangthai}}</span></td>
                                                    @endif
                                                    <td>
                                                        <a href="{{url('dvvantai/kkdvxkct/'.$kk->id)}}" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Chi tiết</a>

                                                        @if($kk->trangthai == "Chờ chuyển")
                                                            <a href="{{url('dvvantai/kkdvxk/'.$kk->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>

                                                            <button type="button" onclick="confirmDelete('{{$kk->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                                                Xóa</button>

                                                            <button type="button" onclick="confirmChuyen('{{$kk->id}}')" class="btn btn-default btn-xs mbs" data-target="#chuyen-modal-confirm" data-toggle="modal"><i class="fa fa-share-square-o"></i>&nbsp;
                                                                Chuyển</button>
                                                        @elseif($kk->trangthai == 'Chờ duyệt')
                                                            @if(session('admin')->level == 'T')
                                                                <button type="button" onclick="confirmTraLai('{{$kk->id}}')" class="btn btn-default btn-xs mbs" data-target="#tralai-modal-confirm" data-toggle="modal"><i class="fa fa-mail-reply"></i>&nbsp;
                                                                    Trả lại</button>

                                                                <a href="{{url('dvvantai/kkdvxk/'.$kk->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Ngày nhận HS</a>
                                                            @endif
                                                        @else
                                                            @if(session('admin')->level == 'T')
                                                                <a href="{{url('dvvantai/kkdvxk/'.$kk->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Ngày nhận HS</a>
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

    @include('includes.e.modal-confirm')

@stop


