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
        function confirmTraLai(tt,id) {
            document.getElementById("idtralai").value =id;
            document.getElementById("tttralai").value =tt;
        }
        function confirmDuyet(tt,id){
            document.getElementById("idduyet").value =id;
            document.getElementById("ttduyet").value =tt;
        }
        function confirmNhanHs(tt,id){
            /**var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/ajax/nhanhs',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id,
                    tt: tt
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        $('#ttnhanhs').replaceWith(data.message);
                    }
                }
            })*/
            document.getElementById("idnhan").value =id;
            document.getElementById("ttnhan").value =tt;
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
                                <!--button id="btnMultiDuyet" type="button" onclick="multiDuyet()" class="btn btn-default btn-xs mbs" data-target="#duyet-modal-confirm" data-toggle="modal"><i class="fa fa-check-square-o"></i>&nbsp;
                                    Duyệt</button-->
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
                                                <td>{{$ttkk->socv}}
                                                    @if($ttkk->trangthai!= 'Chờ nhận')
                                                        <br>Số hồ sơ nhận: <b>{{$ttkk->sohsnhan}}</b>
                                                        <br>Ngày nhận: <b>{{getDayVn($ttkk->ngaynhan)}}</b>
                                                    @endif
                                                </td>
                                                <td>{{$ttkk->ttnguoinop}}</td>

                                                @if($ttkk->trangthai == 'Chờ duyệt')
                                                    <td align="center"><span class="badge badge-warning">{{$ttkk->trangthai}}</span>
                                                        <br>Thời gian chuyển:<br><b>{{getDateTime($ttkk->ngaychuyen)}}</b>
                                                    </td>
                                                @elseif($ttkk->trangthai == 'Chờ nhận')
                                                    <td align="center"><span class="badge badge-warning">{{$ttkk->trangthai}}</span>
                                                        <br>Thời gian chuyển:<br><b>{{getDateTime($ttkk->ngaychuyen)}}</b>
                                                    </td>
                                                @else
                                                    <td align="center">
                                                        <span class="badge badge-success">{{$ttkk->trangthai}}</span>
                                                        <br>Thời gian chuyển:<br><b>{{getDateTime($ttkk->ngaychuyen)}}</b>
                                                    </td>
                                                @endif
                                                <td>
                                                @if($tt == 'CB')
                                                    <a href="{{url('kkgdvlt/viewkk/'.$ttkk->idkk)}}" target="_blank" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                                @else
                                                    <a href="{{url('kkgdvlt/viewkk/'.$ttkk->id)}}" target="_blank" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                                @endif
                                                @if($ttkk->trangthai == 'Chờ duyệt')
                                                    <button type="button" onclick="confirmDuyet('{{$tt}}','{{$ttkk->id}}')" class="btn btn-default btn-xs mbs" data-target="#duyet-modal-confirm" data-toggle="modal"><i class="fa fa-check-square-o"></i>&nbsp;
                                                        Duyệt</button>&nbsp;
                                                    <a href="{{url('xetduyetkkgdvlt/'.$tt.'/'.$ttkk->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                                @endif
                                                @if($ttkk->trangthai == 'Chờ nhận')
                                                    <button type="button" onclick="confirmTraLai('{{$tt}}','{{$ttkk->id}}')" class="btn btn-default btn-xs mbs" data-target="#chuyen-modal-confirm" data-toggle="modal"><i class="fa fa-reply"></i>&nbsp;
                                                        Trả lại</button>
                                                    <button type="button" onclick="confirmNhanHs('{{$tt}}','{{$ttkk->id}}')" class="btn btn-default btn-xs mbs" data-target="#nhan-modal-confirm" data-toggle="modal"><i class="fa fa-share"></i>&nbsp;
                                                        Nhận hồ sơ</button>
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
                    <input type="hidden" name="tttralai" id="tttralai">
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickTraLai()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <!--Modal Duyệt-->
    <div id="duyet-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'xetduyetkkgdvlt/duyet','id' => 'frm_Duyet','class'=>'form-horizontal form-validate']) !!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý duyệt kê khai giá dịch vụ lưu trú cho cơ sở kinh doanh?</h4>
                </div>
                <input type="hidden" name="idduyet" id="idduyet" value="">
                <input type="hidden" name="ttduyet" id="ttduyet">
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickDuyet()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <!--Modal Nhận Hs-->
    <div id="nhan-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'xetduyetkkgdvlt/nhanhs','id' => 'frm_NhanHs','class'=>'form-horizontal form-validate']) !!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý nhận hồ sơ kê khai giá dịch vụ lưu trú của cơ sở kinh doanh?</h4>
                </div>
                <!--div class="modal-body">
                    <div class="form-horizontal" id="ttnhanhs">

                    </div>
                </div-->
                <input type="hidden" name="idnhan" id="idnhan" value="">
                <input type="hidden" name="ttnhan" id="ttnhan">
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickNhanHs()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script>
        function ClickTraLai(){
            $('#frm_TraLai').submit();
        }
        function ClickDuyet(){
            $('#frm_Duyet').submit();
        }
        function ClickNhanHs(){
            $('#frm_NhanHs').submit();
        }
        $(function(){

            $('#select_loaihoso').change(function() {
                var hs_type = $('#select_loaihoso').val();
                var url = '/xetduyetkkgdvlt/'+hs_type;

                //var url = current_path_url;
                window.location.href = url;
            });
        })
    </script>
@stop


