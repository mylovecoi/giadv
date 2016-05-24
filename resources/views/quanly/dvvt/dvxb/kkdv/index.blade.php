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
            $('#frmDelete').attr('action', "thaotac/delete/" + id);
        }

        function confirmTraLai(id) {
            $('#frmTraLai').attr('action', "thaotac/tralai/" + id);
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
                $('#frmDuyet').attr('action', "{{ url('dvvantai/dvxb/thaotac/duyet')}}/" + ids);
            }
        }
        function multiBoDuyet() {

            var ids = getSelectedCheckboxes();
            if(ids == '') {
                $('#btnMultiBoDuyet').attr('data-target', '#notid-modal-confirm');
            }else {

                $('#btnMultiBoDuyet').attr('data-target', '#boduyet-modal-confirm');
                $('#frmBoDuyet').attr('action', "{{ url('dvvantai/dvxb/thaotac/boduyet')}}/" + ids);
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
                                <b>KÊ KHAI GIÁ DỊCH VỤ VẬN TẢI HÀNH KHÁCH BẰNG XE BUÝT THEO TUYẾN CỐ ĐỊNH</b>
                            </div>
                            <div class="actions">
                                <!--
                                    <button id="btnMultiDuyet" type="button" onclick="multiDuyet()" class="btn btn-warning btn-xs" data-target="#duyet-modal-confirm" data-toggle="modal"><i class="fa fa-check-square-o"></i>&nbsp;
                                        Duyệt</button>
                                    <button id="btnMultiBoDuyet" type="button" onclick="multiBoDuyet()" class="btn btn-pink btn-xs" data-target="#boduyet-modal-confirm" data-toggle="modal"><i class="fa fa-square-o"></i>&nbsp;
                                        Bỏ duyệt</button>
                                -->
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row mbm">
                                <a href="{{url('dvvantai/dvxb/kekhai/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Kê khai mới</a>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="table_id"class="table table-hover table-striped table-bordered table-advanced tablesorter">
                                            <thead>
                                            <tr>
                                                <th style="width: 1%; padding: 10px; background: #efefef"><input type="checkbox" class="checkall"/></th>
                                                <th style="width: 10%">Ngày kê khai</th>
                                                <th style="width: 10%">Áp dụng từ ngày</th>
                                                <th style="width: 15%">Số công văn</th>
                                                <th style="width: 15%">Số công văn liền kề</th>
                                                <th style="width: 20%">Ghi chú</th>
                                                <th style="width: 15%">Trạng thái</th>
                                                <th style="width: 15%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($model as $kk)
                                                <tr>
                                                    <td><input type="checkbox" type="checkbox" name = "ck_value"  id="ck_value" value="{{$kk->id}}"/></td>
                                                    <td>{{getDayVn($kk->ngaynhap)}}</td>
                                                    <td>{{getDayVn($kk->ngayhieuluc)}}</td>
                                                    <td>{{$kk->socv}}
                                                        @if($kk->trangthai == 'Chờ duyệt')
                                                            <br>Số hồ sơ:<br><b>{{$kk->sohsnhan}}</b>
                                                            <br>Thời gian nhận:<br><b>{{getDayVn($kk->ngaynhan)}}</b>
                                                        @endif
                                                    </td>
                                                    <td>{{$kk->socvlk .' - '. (getDayVn($kk->ngaynhaplk)=='01/01/1970'?'':getDayVn($kk->ngaynhaplk))}}</td>
                                                    <td>{!! nl2br(e($kk->ghichu)) !!}</td>
                                                    <td align="center">
                                                        @if($kk->trangthai == "Chờ chuyển")
                                                            <span class="badge badge-warning">{{$kk->trangthai}}</span>
                                                        @elseif($kk->trangthai == 'Chờ duyệt')
                                                            <span class="badge badge-success">{{$kk->trangthai}}</span>
                                                            <br>Thời gian nhận:<br><b>{{getDateTime($kk->ngaynhan)}}</b>
                                                        @elseif($kk->trangthai == 'Bị trả lại')
                                                            <span class="badge badge-danger">{{$kk->trangthai}}</span><br>&nbsp;
                                                        @elseif($kk->trangthai == 'Duyệt')
                                                            <span class="badge badge-success">{{$kk->trangthai}}</span>
                                                        @else
                                                            <span class="badge badge-success">{{$kk->trangthai}}</span>
                                                            <br>Thời gian chuyển:<br><b>{{getDateTime($kk->ngaychuyen)}}</b>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <a href="{{url('dvvantai/kkdvxkct/print/'.$kk->masokk)}}" target="_blank" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Chi tiết</a>
                                                        @if($kk->trangthai == "Chờ chuyển")
                                                            <a href="{{url('dvvantai/kkdvxk/'.$kk->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                                            <button type="button" onclick="confirmDelete('{{$kk->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                                            <button type="button" onclick="confirmChuyen('{{$kk->id}}')" class="btn btn-default btn-xs mbs" data-target="#chuyendvvt-modal-confirm" data-toggle="modal"><i class="fa fa-share-square-o"></i>&nbsp;Chuyển</button>
                                                        @elseif($kk->trangthai == 'Chờ nhận')
                                                            <button type="button" onclick="TTNguoiChuyen('{{$kk->ttnguoinop}}')" class="btn btn-default btn-xs mbs" data-target="#chuyendvvt-modal-confirm" data-toggle="modal"><i class="fa fa-user"></i>&nbsp;Người chuyển</button>
                                                        @elseif($kk->trangthai == 'Bị trả lại')
                                                            <a href="{{url('dvvantai/kkdvxk/'.$kk->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                                            <button type="button" onclick="LyDoTraLai('{{$kk->lydo}}')" class="btn btn-default btn-xs mbs" data-target="#tradvvt-modal-confirm" data-toggle="modal"><i class="fa fa-list"></i>&nbsp;Lý do trả lại</button>
                                                            <button type="button" onclick="confirmDelete('{{$kk->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                                            <button type="button" onclick="confirmChuyen('{{$kk->id}}')" class="btn btn-default btn-xs mbs" data-target="#chuyendvvt-modal-confirm" data-toggle="modal"><i class="fa fa-share-square-o"></i>&nbsp;Chuyển</button>
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
        function confirmChuyen(id) {
            $('#idkk').attr('value', id);
        }

        function clkNguoiChuyen(str){
            //alert(str);
            aNgCh=str.split('&');
            $('input[name="nguoinoptt"]').val(aNgCh[0]);
            $('input[name="ngaychuyentt"]').val(aNgCh[1]);
            $('input[name="sdtnntt"]').val(aNgCh[2]);
            $('input[name="faxnntt"]').val(aNgCh[3]);
            $('input[name="emailnntt"]').val(aNgCh[4]);
        }

        function clickChuyenDVVT(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/dvvantai/dvxb/thaotac/chuyen',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('#idkk').val(),
                    nguoinop: $('input[name="nguoinop"]').val(),
                    ngaychuyen: $('input[name="ngaychuyen"]').val(),
                    sdtnn: $('input[name="sdtnn"]').val(),
                    faxnn: $('input[name="faxnn"]').val(),
                    emailnn: $('input[name="emailnn"]').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        alert('Chuyển bảng kê khai thành công.');
                        location.reload();
                    }
                },
                error: function(message){
                    alert(message);
            }
            })

        }
    </script>

    @include('includes.e.modal-confirm')

@stop


