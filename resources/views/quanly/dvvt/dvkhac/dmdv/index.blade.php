<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 4/25/2016
 * Time: 10:55 PM
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
            $('#frmDelete').attr('action', "/dvvantai/dvkhac/deldv/" + id);
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
                                <b>THÔNG TIN DỊCH VỤ VẬN TẢI KHÁC</b>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="actions">
                                <button type="button" id="_btnThemDV" class="btn btn-success mbs" onclick="addDVXK()" ><i class="fa fa-plus"></i>&nbsp;Thêm mới dịch vụ</button>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter">
                                            <thead>
                                            <tr>
                                                <th style="width: 10%">Loại xe</th>
                                                <th style="width: 25%">Mô tả dịch vụ</th>
                                                <th style="width: 25%">Quy cách chất lượng</th>
                                                <th style="width: 10%">Đơn vị tính</th>
                                                <th style="width: 20%">Ghi chú</th>
                                                <th style="width: 10%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody id="noidung">
                                            @foreach($model as $dv)
                                                <tr>
                                                    <td name="loaixe">{{$dv->loaixe}}</td>
                                                    <td name="tendichvu">{{$dv->tendichvu}}</td>
                                                    <td name="qccl">{{$dv->qccl}}</td>
                                                    <td name="dvt">{{$dv->dvt}}</td>
                                                    <td name="ghichu">{{$dv->ghichu}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-default btn-xs mbs" onclick="editDVXK(this,'{{$dv->id}}')"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>&nbsp;
                                                        <button type="button" onclick="confirmDelete('{{$dv->id}}')" class="btn btn-danger btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
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

    <!--Modal thông tin dịch vụ vận tải xe khách-->
    <div id="dvxk-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Thông tin dịch vụ vận tải chở hàng</h4>
                </div>
                <div class="modal-body">
                    @include('quanly.dvvt.template.dmdvkhac')
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary" onclick="confirmDVXK()">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDVXK(){
            var valid=true;
            var message='';
            var tendichvu= $('#tendichvu').val();
            var dvt= $('#dvt').val();
            var loaixe= $('#loaixe').val();

            if(tendichvu==''){
                valid=false;
                message +='Tên dịch vụ không được bỏ trống \n';
            }

            if(dvt==''){
                valid=false;
                message +='Đơn vị tính không được bỏ trống \n';
            }

            if(loaixe==''){
                valid=false;
                message +='Loại xe không được bỏ trống \n';
            }

            //return false;
            if(valid){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/dvvantai/dvkhac/dmdv',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        tendichvu: tendichvu,
                        qccl: $('#qccl').val(),
                        dvt: dvt,
                        loaixe: loaixe,
                        ghichu: $('#ghichu').val(),
                        id: $('#iddv').val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        //alert(data.message);
                        if (data.status == 'success') {
                            location.reload();
                            //$('#noidung').replaceWith(data.message);
                        }
                    },
                    error: function(message){
                        alert(message);
                    }
                });//
                $('#dvxk-modal-confirm').modal('hide');
            }else{
                alert(message);
            }
            return valid;
        }

        function editDVXK(e,id){
            var tr = $(e).closest('tr');
            $('#loaixe').attr('value',$(tr).find('td[name=loaixe]').text());
            $('#tendichvu').attr('value',$(tr).find('td[name=tendichvu]').text());
            $('#qccl').attr('value',$(tr).find('td[name=qccl]').text());
            $('#dvt').attr('value',$(tr).find('td[name=dvt]').text());
            $('#ghichu').attr('value',$(tr).find('td[name=ghichu]').text());
            $('#iddv').attr('value',id);
            $('#dvxk-modal-confirm').modal('show');
        }

        function addDVXK(){
            $('#iddv').attr('value',0);
            $('#loaixe').attr('value','');
            $('#tendichvu').attr('value','');
            $('#qccl').attr('value','');
            $('#dvt').attr('value','');
            $('#ghichu').attr('value','');
            $('#dvxk-modal-confirm').modal('show');
        }

    </script>
    @include('includes.e.modal-confirm')

@stop


