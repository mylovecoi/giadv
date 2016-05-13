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
        function confirmTraLai(id) {
            document.getElementById("idtralai").value =id;
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
                                <b>XÉT DUYỆT KÊ KHAI GIÁ DỊCH VỤ LƯU TRÚ</b>
                            </div>
                            <div class="actions">
                                <button id="btnMultiDuyet" type="button" onclick="multiDuyet()" class="btn btn-warning btn-xs" data-target="#duyet-modal-confirm" data-toggle="modal"><i class="fa fa-check-square-o"></i>&nbsp;
                                    Duyệt</button>
                                <button id="btnMultiBoDuyet" type="button" onclick="multiBoDuyet()" class="btn btn-pink btn-xs" data-target="#boduyet-modal-confirm" data-toggle="modal"><i class="fa fa-square-o"></i>&nbsp;
                                    Bỏ duyệt</button>
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
                                                <th>Cơ sở kinh doanh</th>
                                                <th>Ngày kê khai</th>
                                                <th>Ngày thực hiện<br>mức giá kê khai</th>
                                                <th>Số công văn</th>
                                                <th>Thông tin người chuyển</th>
                                                <th width="15%">Trạng thái</th>
                                                <th width="20%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($model as $ttkk)
                                            <tr>
                                                <td><input type="checkbox" type="checkbox" name = "ck_value"  id="ck_value" value="{{$ttkk->id}}"/></td>
                                                <td>{{$ttkk->tencskd}}</td>
                                                <td>{{getDayVn($ttkk->ngaynhap)}}</td>
                                                <td>{{getDayVn($ttkk->ngayhieuluc)}}</td>
                                                <td>{{$ttkk->socv}}</td>
                                                <td>{{$ttkk->ttnguoinop}}</td>
                                                @if($ttkk->trangthai == 'Chờ duyệt')
                                                    <td align="center"><span class="badge badge-success">{{$ttkk->trangthai}}</span>
                                                        <br>Thời gian chuyển:<br><b>{{$ttkk->ngaychuyen}}</b>
                                                    </td>
                                                @else
                                                    <td align="center"><span class="badge badge-success">{{$ttkk->trangthai}}</span></td>
                                                @endif
                                                <td>
                                                @if($ttkk->trangthai == 'Chờ duyệt')
                                                    <a href="{{url('kkgdvlt/viewkk/'.$ttkk->id)}}" target="_blank" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                                    <button type="button" onclick="confirmTraLai('{{$ttkk->id}}')" class="btn btn-default btn-xs mbs" data-target="#chuyen-modal-confirm" data-toggle="modal"><i class="fa fa-share-square-o"></i>&nbsp;
                                                        Trả lại</button>
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

    <!--Modal Trả lại-->
    <div id="chuyen-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'xetduyetkkgdvlt/tralai','id' => 'frm_TraLai','class'=>'form-horizontal form-validate']) !!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Trả lại kê khai giá dịch vụ lưu trú cho cơ sở kinh doanh?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-4 control-label"><b>Lý do trả lại</b></label>
                            <div class="col-md-8 ">
                                    <textarea id="lydo" class="form-control required" name="lydo" cols="30" rows="6"
                                              placeholder="Lý do trả lại kê khai giá dịch vụ lưu trú cho cơ sở kinh doanh"></textarea>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="idtralai" id="idtralai" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickTraLai()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script>

        function ClickTraLai(){
            $('#frm_TraLai').submit();
        }
    </script>
@stop


