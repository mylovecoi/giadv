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
                                <a href="{{url('dvvantai/kkdvxk/create')}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Kê khai giá mới</a>
                            </div>
                        </div>
                        @include('quanly.dvvt.template.indexkkdv')
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>

        function InChiTiet(masokk){
            var url='/dvvantai/kkdvxkct/print/'+ masokk;
            window.open(url,'_blank');
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

        function confirmChuyen(id) {
            $('#idkk').attr('value', id);
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
    </script>
    @include('includes.e.modal-confirm')

@stop


