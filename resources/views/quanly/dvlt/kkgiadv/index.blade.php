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
        function confirmChuyen(id) {
            document.getElementById("idchuyen").value =id;
        }
        function viewLyDo(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/ajax/viewlydo',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        $('#ndlydo').replaceWith(data.message);
                    }
                }
            })
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
                                <b>KÊ KHAI GIÁ DỊCH VỤ LƯU TRÚ - {{$modelcskd->tencskd}}</b>
                            </div>
                            <div class="actions">
                                <a href="{{url('kkgdvlt/'.$modelcskd->id.'/create')}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i>&nbsp;Kê khai giá</a>

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
                                                <th>Ngày kê khai</th>
                                                <th>Ngày thực hiện<br>mức giá kê khai</th>
                                                <th>Số công văn</th>
                                                <th>Số công văn liền kề</th>
                                                <th width="15%">Trạng thái</th>
                                                <th width="20%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($model as $ttkk)
                                            <tr>
                                                <td><input type="checkbox" type="checkbox" name = "ck_value"  id="ck_value" value="{{$ttkk->id}}"/></td>
                                                <td>{{getDayVn($ttkk->ngaynhap)}}</td>
                                                <td>{{getDayVn($ttkk->ngayhieuluc)}}</td>
                                                <td>{{$ttkk->socv}}
                                                    @if($ttkk->trangthai== 'Duyệt')
                                                        <br>Số hồ sơ nhận: {{$ttkk->sohsnhan}}
                                                        <br>Ngày nhận: {{getDayVn($ttkk->ngaynhan)}}
                                                    @endif
                                                </td>
                                                <td>{{$ttkk->socvlk.'-'.getDayVn($ttkk->ngaycvlk)}}</td>
                                                @if($ttkk->trangthai == "Chờ chuyển")
                                                <td align="center"><span class="badge badge-warning">{{$ttkk->trangthai}}</span></td>
                                                @elseif($ttkk->trangthai == 'Chờ duyệt')
                                                    <td align="center"><span class="badge badge-success">{{$ttkk->trangthai}}</span>
                                                        <br>Thời gian chuyển:<br><b>{{getDateTime($ttkk->ngaychuyen)}}</b>
                                                    </td>
                                                @elseif($ttkk->trangthai == 'Bị trả lại')
                                                    <td align="center">
                                                        <span class="badge badge-danger">{{$ttkk->trangthai}}</span><br>&nbsp;
                                                    </td>
                                                @else
                                                    <td align="center">
                                                        <span class="badge badge-success">{{$ttkk->trangthai}}</span>
                                                        <br>Thời gian chuyển:<br><b>{{getDateTime($ttkk->ngaychuyen)}}</b>
                                                    </td>
                                                @endif
                                                <td>
                                                    <a href="{{url('kkgdvlt/viewkk/'.$ttkk->id)}}" target="_blank" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                                @if($ttkk->trangthai == 'Chờ chuyển' || $ttkk->trangthai == 'Bị trả lại')
                                                    <a href="{{url('kkgdvlt/'.$modelcskd->id.'/'.$ttkk->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>

                                                    <button type="button" onclick="confirmDelete('{{$ttkk->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                                        Xóa</button>
                                                    <button type="button" onclick="confirmChuyen('{{$ttkk->id}}')" class="btn btn-default btn-xs mbs" data-target="#chuyen-modal-confirm" data-toggle="modal"><i class="fa fa-share-square-o"></i>&nbsp;
                                                        Chuyển</button>
                                                    @if( $ttkk->trangthai == 'Bị trả lại')
                                                        <button type="button" data-target="#modal-lydo" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="viewLyDo({{$ttkk->id}});"><i class="fa fa-search"></i>&nbsp;Lý do trả lại</button>
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
        {!! Form::open(['url'=>'kkgdvlt/delete/'.$modelcskd->id,'id' => 'frm_delete','files'=>true, 'class'=>'form-horizontal form-validate']) !!}
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
    <!--Modal Chuyển-->
    <div id="chuyen-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'kkgdvlt/chuyen/'.$modelcskd->id,'id' => 'frm_Chuyen','class'=>'form-horizontal form-validate']) !!}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                class="close">&times;</button>
                        <h4 id="modal-header-primary-label" class="modal-title">Đồng ý chuyển kê khai giá dịch vụ lưu trú lên Sở Tài Chính?</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-4 control-label"><b>Thông tin người chuyển</b></label>
                                <div class="col-md-8 ">
                                    <textarea id="ttnguoinop" class="form-control required" name="ttnguoinop" cols="30" rows="6"
                                              placeholder="Họ và tên - Số điện thoại liên lạc - Email - Fax"></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="idchuyen" id="idchuyen" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickChuyen()">Đồng ý</button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    <!--Modal Chuyển-->
    <div id="chuyen-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'kkgdvlt/chuyen/'.$modelcskd->id,'id' => 'frm_Chuyen','class'=>'form-horizontal form-validate']) !!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý chuyển kê khai giá dịch vụ lưu trú lên Sở Tài Chính?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-4 control-label"><b>Thông tin người chuyển</b></label>
                            <div class="col-md-8 ">
                                    <textarea id="ttnguoinop" class="form-control required" name="ttnguoinop" cols="30" rows="6"
                                              placeholder="Họ và tên - Số điện thoại liên lạc - Email - Fax"></textarea>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="idchuyen" id="idchuyen" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickChuyen()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <!--Modal Lý do-->
    <div id="modal-lydo" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Thông tin kê khai giá dịch vụ lưu trú bị trả lại!</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-3 control-label"><b>Lý do trả lại</b></label>
                            <div class="col-md-9 ">
                                    <textarea id="ndlydo" class="form-control required" name="ndlydo" cols="30" rows="6"
                                              ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function ClickDelete(){
            $('#frm_delete').submit();
        }
        function ClickChuyen(){
            $('#frm_Chuyen').submit();
        }
    </script>

@stop


