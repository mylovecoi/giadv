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
            $('#frmDelete').attr('action', "dndvvt/delete/" + id);
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
                                <b>DANH SÁCH DOANH NGHIỆP CUNG CẤP DỊCH VỤ VẬN TẢI</b>
                            </div>
                            <div class="actions">
                                <a href="{{url('dndvvt/create')}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i>&nbsp;Kê khai mới</a>
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
                                                <th width="20%">Tên doanh nghiệp</th>
                                                <th>Mã số thuế</th>
                                                <th>Giấy phép kinh doanh số</th>
                                                <th>Số điện thoại trụ sở</th>
                                                <th>Địa chỉ</th>
                                                <th width="20%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($model as $donvi)
                                                <tr>
                                                    <td><input type="checkbox" type="checkbox" name = "ck_value"  id="ck_value" value="{{$donvi->id}}"/></td>
                                                    <td>{{$donvi->tendn}}</td>
                                                    <td>{{$donvi->masothue}}</td>
                                                    <td>{{$donvi->giayphepkddn}}</td>
                                                    <td>{{$donvi->dienthoaidn}}</td>
                                                    <td>{{$donvi->diachidn}}</td>
                                                    <td>
                                                        <a href="{{url('dndvvt/'.$donvi->id.'/edit')}}" class="btn btn-info btn-xs mbs">&nbsp;Chỉnh sửa</a>

                                                        <button type="button" onclick="confirmDelete('{{$donvi->id}}')" class="btn btn-danger btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal">
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


