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
            $('#frmDelete').attr('action', "/dvvantai/thaotackkdvxk/delete/" + id);
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
                                <!-- Chờ xem thực tế đơn vị rồi làm
                                <button id="btnMultiDuyet" type="button" onclick="multiDuyet()" class="btn btn-warning btn-xs" data-target="#duyet-modal-confirm" data-toggle="modal"><i class="fa fa-check-square-o"></i>&nbsp;
                                        Duyệt</button>
                                <button id="btnMultiBoDuyet" type="button" onclick="multiBoDuyet()" class="btn btn-pink btn-xs" data-target="#boduyet-modal-confirm" data-toggle="modal"><i class="fa fa-square-o"></i>&nbsp;
                                        Bỏ duyệt</button>
                                -->
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row mbm">
                                <div class="col-md-1">
                                    <div class="form-control-static"  style="white-space: nowrap;">Loại hồ sơ</div>
                                </div>
                                <div class="col-md-5">
                                    <select id="select_loaihoso" name="select_loaihoso" class="form-control required">
                                        <option value="CN" {{ ($tt == 'CN') ? 'selected' : '' }}>Hồ sơ kê khai giá dịch vụ đang chờ nhận</option>
                                        <option value="CD" {{ ($tt == 'CD') ? 'selected' : '' }}>Hồ sơ kê khai giá dịch vụ đang chờ duyệt</option>
                                        <option value="D" {{ ($tt == 'D') ? 'selected' : '' }}>Hồ sơ kê khai giá dịch vụ đã duyệt</option>
                                        <option value="CB" {{ ($tt == 'CB') ? 'selected' : '' }}>Hồ sơ kê khai giá dịch vụ đang công bố</option>
                                    </select>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="table_id"class="table table-hover table-striped table-bordered table-advanced tablesorter">
                                            <thead>
                                            <tr>
                                                <th style="width: 1%; padding: 10px; background: #efefef"><input type="checkbox" class="checkall"/></th>
                                                <th style="width: 25%">Đơn vị kê khai</th>
                                                <th style="width: 10%">Ngày kê khai</th>
                                                <th style="width: 10%">Áp dụng từ ngày</th>
                                                <th style="width: 15%">Số công văn</th>
                                                <th style="width: 15%">Thông tin người nộp</th>
                                                <th style="width: 15%">Trạng thái</th>
                                                <th style="width: 10%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($model as $kk)
                                                <tr>
                                                    <td><input type="checkbox" type="checkbox" name = "ck_value"  id="ck_value" value="{{$kk->id}}"/></td>
                                                    <td>{{$kk->tendonvi}}</td>
                                                    <td>{{getDayVn($kk->ngaynhap)}}</td>
                                                    <td>{{getDayVn($kk->ngayhieuluc)}}</td>
                                                    <td>{{$kk->socv}}
                                                        @if($kk->trangthai == 'Chờ duyệt')
                                                            <br>Số hồ sơ:<br><b>{{$kk->sohsnhan}}</b>
                                                            <br>Thời gian nhận:<br><b>{{getDayVn($kk->ngaynhan)}}</b>
                                                        @endif
                                                    </td>
                                                    <td>{{$kk->ttnguoinop}}
                                                    </td>
                                                    <td align="center">

                                                    @if($kk->trangthai == 'Chờ duyệt')
                                                        <span class="badge badge-blue">{{$kk->trangthai}}</span>
                                                            <br>Thời gian nhận:<br><b>{{getDayVn($kk->ngaynhan)}}</b>
                                                    @elseif($kk->trangthai == 'Duyệt')
                                                            <span class="badge badge-success">{{$kk->trangthai}}</span>
                                                    @elseif($kk->trangthai == 'Chờ nhận')
                                                            <span class="badge badge-info">{{$kk->trangthai}}</span>
                                                            <br>Thời gian chuyển:<br><b>{{getDateTime($kk->ngaychuyen)}}</b>
                                                    @elseif($kk->trangthai == 'Đang công bố')
                                                            <span class="badge badge-success">{{$kk->trangthai}}</span>
                                                    @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{url('dvvantai/kkdvxkct/print/'.$kk->masokk)}}" target="_blank" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Chi tiết</a>
                                                        @if($kk->trangthai == 'Chờ nhận')
                                                            <button type="button" onclick="TTNguoiChuyen('{{$kk->ttnguoinop}}')" class="btn btn-default btn-xs mbs" data-target="#chuyendvvt-modal-confirm" data-toggle="modal"><i class="fa fa-user"></i>&nbsp;Người chuyển</button>
                                                            <button type="button" onclick="confirmNhan('{{$kk->id}}')" class="btn btn-default btn-xs mbs" data-target="#nhandvvt-modal-confirm" data-toggle="modal"><i class="fa fa-share-square-o"></i>&nbsp;Nhận hồ sơ</button>
                                                            <button type="button" onclick="confirmTraLai('{{$kk->id}}')" class="btn btn-default btn-xs mbs" data-target="#tradvvt-modal-confirm" data-toggle="modal"><i class="fa fa-share-square-o"></i>&nbsp;Trả lại</button>
                                                        @elseif($kk->trangthai == 'Chờ duyệt')
                                                            <button type="button" onclick="comfirmDuyet('{{$kk->id}}')" class="btn btn-default btn-xs mbs" data-target="#duyeths-modal-confirm" data-toggle="modal"><i class="fa fa-check-square"></i>&nbsp;Duyệt hồ sơ</button>
                                                            <button type="button" onclick="confirmTraLai('{{$kk->id}}')" class="btn btn-default btn-xs mbs" data-target="#tradvvt-modal-confirm" data-toggle="modal"><i class="fa fa-share-square-o"></i>&nbsp;Trả lại</button>
                                                            <button type="button" onclick="confirmNhanCS('{{$kk->id.'?'.$kk->sohsnhan.'?'.$kk->ngaynhan}}')" class="btn btn-default btn-xs mbs" data-target="#nhandvvt-modal-confirm" data-toggle="modal"><i class="fa fa-share-square-o"></i>&nbsp;Chỉnh sửa</button>
                                                        @elseif($kk->trangthai == 'Đã công bố')
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

        function clickNhanHS(){
            //alert($('#ngaynhan').val()=='');
            if($('#ngaynhan').val()==''){
                alert('Ngày nhận hồ sơ không hợp lệ');
                return false;
            }
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/dvvantai/kkdvxk/nhanhs',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('#idnhan').val(),
                    sohsnhan: $('#sohsnhan').val(),
                    ngaynhan: $('#ngaynhan').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        //alert('Nhận bảng kê khai thành công.');
                        location.reload();
                    }
                },
                error: function (message) {
                    alert(message);
                }
            })
        }

        function clickTraDVVT() {
            //$('#frmTraLai').attr('action', "dvvantai/thaotackkdvxk/tralai/" + id);
            if ($('#idtra').attr('value') != 'null') {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/dvvantai/thaotackkdvxk/tralai',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        id: $('#idtra').val(),
                        lydo: $('#lydotra').val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if (data.status == 'success') {
                            alert('Trả lại bảng kê khai thành công.');
                            location.reload();
                        }
                    },
                    error: function (message) {
                        alert(message);
                    }
                })
            }
        }

        function clickDuyetHS() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/dvvantai/duyetkkdvxk',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('#idduyet').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        location.reload();
                    }
                },
                error: function (message) {
                    alert(message);
                }
            })
        }

        function confirmNhan(id) {
            $('#idnhan').attr('value', id);
            var sohs =  {!! (getGeneralConfigs()['sodvvt'] + 1); !!};
            var today = new Date();
            //alert(sohs);
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();

            if(dd<10) {
                dd='0'+dd
            }

            if(mm<10) {
                mm='0'+mm
            }

            $('#ngaynhan').attr('value', yyyy+'-'+ mm+'-'+dd);
            $('#sohsnhan').attr('value', sohs);
        }

        function confirmNhanCS(str){
            var aKQ=str.split('?');
            $('#idnhan').attr('value', aKQ[0]);
            $('#sohsnhan').attr('value', aKQ[1]);
            $('#ngaynhan').attr('value', aKQ[2]);
        }

        function confirmChuyen(id) {
            $('#idkk').attr('value', id);
        }

        function comfirmDuyet(id){
            $('#idduyet').attr('value', id);
        }

        function confirmTraLai(id) {
            $('#idtra').attr('value', id);
        }

        function LyDoTraLai(str){
            $('#lydotra').attr('value', str);
            $('#idtra').attr('value', 'null');
        }

        function TTNguoiChuyen(str){
            $('#ttnguoinop').attr('value', str);
            $('#idkk').attr('value', 'null');
        }

        function clickChuyenDVVT() {
            if ($('#idkk').attr('value') != 'null') {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/dvvantai/thaotackkdvxk/chuyen',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        id: $('#idkk').val(),
                        ttnguoinop: $('textarea[name="ttnguoinop"]').val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if (data.status == 'success') {
                            alert('Chuyển bảng kê khai thành công.');
                            location.reload();
                        }
                    },
                    error: function (message) {
                        alert(message);
                    }
                })
            }
        }

        $(document).ready(function () {
            $('#select_loaihoso').change(function () {
                var tt = 'CN';
                tt = $('#select_loaihoso').val();
                var url = '/dvvantai/xetduyetkkdvxk/' + tt;
                window.location.href = url;
            });
        });
    </script>
    @include('includes.e.modal-confirm')

@stop


