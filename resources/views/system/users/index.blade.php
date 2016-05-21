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
            $('#frmDelete').attr('action', "user/delete/" + id);
        }

        function  getSelectedCheckboxes(){

            var ids = '';
            $.each($("input[name='ck_value']:checked"), function(){
                ids += ($(this).attr('value')) + '-';
            });
            return ids = ids.substring(0, ids.length - 1);

        }

        function multiLock() {

            var ids = getSelectedCheckboxes();
            if(ids == '') {
                $('#btnMultiLockUser').attr('data-target', '#notid-modal-confirm');
            }else {

                $('#btnMultiLockUser').attr('data-target', '#lockuser-modal-confirm');
                $('#frmLockUser').attr('action', "{{ url('user/lock')}}/" + ids);
            }

        }
        function multiUnLock() {

            var ids = getSelectedCheckboxes();
            if(ids == '') {
                $('#btnMultiUnLockUser').attr('data-target', '#notid-modal-confirm');
            }else {
                $('#btnMultiUnLockUser').attr('data-target', '#unlockuser-modal-confirm');
                $('#frmUnLockUser').attr('action', "{{ url('user/unlock')}}/" + ids);
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
                            <div class="caption">
                                <b>DANH SÁCH TÀI KHOẢN</b>
                            </div>
                            <div class="actions">
                                <a href="{{url('user/create')}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Thêm mới tài khoản</a>

                                <button id="btnMultiLockUser" type="button" onclick="multiLock()" class="btn btn-primary btn-xs" data-target="#lockuser-modal-confirm" data-toggle="modal"><i class="fa fa-lock"></i>&nbsp;
                                    Khóa tài khoản</button>

                                <button id="btnMultiUnLockUser" type="button" onclick="multiUnLock()" class="btn btn-warning btn-xs" data-target="#unlockuser-modal-confirm" data-toggle="modal"><i class="fa fa-unlock"></i>&nbsp;
                                    Mở khóa</button>
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
                                                    <th>Tên tài khoản </th>
                                                    <th>Username </th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Cấp sử dụng</th>
                                                    <th>Dịch vụ cung cấp</th>
                                                    <th style="width: 11%">Trạng thái </th>
                                                    <th style="width: 20%">Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($model as $user)
                                                <tr>
                                                    <td><input type="checkbox" type="checkbox" name = "ck_value"  id="ck_value" value="{{$user->id}}"/></td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->username}}</td>
                                                    <td>{{$user->phone}}</td>
                                                    <td>{{$user->email}}</td>
                                                    @if($user->level == 'T')
                                                        <td>Cấp Tỉnh</td>
                                                    @elseif($user->level == 'H')
                                                        <td>Doanh nghiệp </td>
                                                    @else
                                                        <td>Cơ sở kinh doanh</td>
                                                    @endif

                                                    <td>{{$user->pldv}}</td>

                                                    @if($user->status == "Kích hoạt")
                                                        <td align="center"><span class="badge badge-warning">{{$user->status}}</span></td>
                                                    @else
                                                        <td align="center"><span class="badge badge-btn-warning">{{$user->status}}</span></td>
                                                    @endif
                                                    <td>
                                                        <a href="{{url('user/'.$user->id.'/edit')}}" class="btn btn-info btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>

                                                        <a href="{{url('user/permission/'.$user->id)}}" class="btn btn-info btn-xs mbs">Phân quyền</a>

                                                        <button type="button" onclick="confirmDelete('{{$user->id}}')" class="btn btn-danger btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
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


