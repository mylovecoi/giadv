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
            $('#frmDelete').attr('action', "companydvlt/delete/" + id);
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
                                <b>Thông tin cơ sở kinh doanh dịch vụ lưu trú - {{$modeldn->tendn}}</b>
                            </div>
                            <div class="actions">
                                <a href="{{url('ttcskddvlt/create')}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i>&nbsp;Kê khai cơ sở kinh doanh</a>

                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter">
                                            <thead>
                                            <tr>
                                                <th style="width: 1%; padding: 10px; background: #efefef"><input type="checkbox" class="checkall"/></th>
                                                <th>Cơ sở kinh doanh</th>
                                                <th>Loại hạng cơ sở kinh doanh</th>
                                                <th>Điện thoại cơ sở kinh doanh</th>
                                                <th>Địa chỉ cơ sở kinh doanh</th>
                                                <th>Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($model as $cskd)
                                            <tr>
                                                <td><input type="checkbox" type="checkbox" name = "ck_value"  id="ck_value" value="{{$cskd->id}}"/></td>
                                                <td>{{$cskd->tencskd}}</td>
                                                <td>
                                                    @if($cskd->loaihang == '1')
                                                        <span class="fa fa-star"></span>
                                                    @elseif($cskd->loaihang == '1.5')
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star-half-o"></span>
                                                    @elseif($cskd->loaihang == '2')
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                    @elseif($cskd->loaihang == '2.5')
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star-half-o"></span>
                                                    @elseif($cskd->loaihang == '3')
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                    @elseif($cskd->loaihang == '3.5')
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star-half-o"></span>
                                                    @elseif($cskd->loaihang == '4')
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                    @elseif($cskd->loaihang == '4.5')
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star-half-o"></span>
                                                    @elseif($cskd->loaihang == '5')
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                    @endif
                                                </td>
                                                <td>{{$cskd->telkd}}</td>
                                                <td>{{$cskd->diachikd}}</td>
                                                <td>
                                                    <a href="{{url('ttcskddvlt/'.$cskd->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>

                                                    <button type="button" onclick="confirmDelete('{{$cskd->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal">
                                                        <i class="fa fa-trash-o"></i>&nbsp; Xóa</button>
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


