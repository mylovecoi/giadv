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
            $('#frmDelete').attr('action', "/dvvantai/dvxtx/thaotac/delete/" + id);
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
                //$('#frmDuyet').attr('action', "{{ url('dvvantai/dvxtx/thaotac/duyet')}}/" + ids);
            }

        }
        function multiBoDuyet() {

            var ids = getSelectedCheckboxes();
            if(ids == '') {
                $('#btnMultiBoDuyet').attr('data-target', '#notid-modal-confirm');
            }else {
                $('#btnMultiBoDuyet').attr('data-target', '#boduyet-modal-confirm');
                //$('#frmBoDuyet').attr('action', "{{ url('dvvantai/dvxtx/thaotac/boduyet')}}/" + ids);
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
                                <b>KÊ KHAI GIÁ DỊCH VỤ VẬN TẢI BẰNG XE TAXI</b>
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
                        @include('quanly.dvvt.template.indexkkdvth')
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        function InChiTiet(masokk){
            var url='/dvvantai/dvxtx/print/'+ masokk;
            window.open(url,'_blank');
        }

        function clickNhanHS(){
            //alert($('#ngaynhan').val()=='');
            if($('#ngaynhan').val()==''){
                alert('Ngày nhận hồ sơ không hợp lệ');
                return false;
            }
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/dvvantai/dvxtx/thaotac/nhanhs',
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
                    url: '/dvvantai/dvxtx/thaotac/tralai',
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
                url: '/dvvantai/dvxtx/duyet',
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

        function confirmNhan(id){
            $('#idnhan').attr('value', id);
            var date = new Date();
            currentDate = date.getDate();     // Get current date
            month       = date.getMonth() + 1; // current month
            year        = date.getFullYear();
            //alert("current date is " + currentDate + "/" + month + "/" + year);
            $('#ngaynhan').attr('value',date);
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

        $(document).ready(function () {
            $('#select_loaihoso').change(function () {
                var tt = 'CN';
                tt = $('#select_loaihoso').val();
                var url = '/dvvantai/dvxtx/xetduyet/' + tt;
                window.location.href = url;
            });
        });
    </script>
    @include('includes.e.modal-confirm')

@stop


