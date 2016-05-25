<div class="portlet-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="table_id"class="table table-hover table-striped table-bordered table-advanced tablesorter">
                    <thead>
                    <tr>
                        <th style="width: 1%; padding: 10px; background: #efefef"><input type="checkbox" class="checkall"/></th>
                        <th style="width: 10%">Ngày kê khai</th>
                        <th style="width: 10%">Áp dụng từ ngày</th>
                        <th style="width: 15%">Số công văn</th>
                        <th style="width: 15%">Số công văn liền kề</th>
                        <th style="width: 20%">Ghi chú</th>
                        <th style="width: 15%">Trạng thái</th>
                        <th style="width: 15%">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody id="noidung">
                    @foreach($model as $kk)
                        <tr>
                            <td><input type="checkbox" type="checkbox" name = "ck_value"  id="ck_value" value="{{$kk->id}}"/></td>
                            <td>{{getDayVn($kk->ngaynhap)}}</td>
                            <td>{{getDayVn($kk->ngayhieuluc)}}</td>
                            <td>{{$kk->socv}}
                                @if($kk->trangthai == 'Chờ duyệt')
                                    <br>Số hồ sơ:<br><b>{{$kk->sohsnhan}}</b>
                                    <br>Thời gian nhận:<br><b>{{getDayVn($kk->ngaynhan)}}</b>
                                @endif
                            </td>
                            <td>{{$kk->socvlk .' - '. (getDayVn($kk->ngaynhaplk)=='01/01/1970'?'':getDayVn($kk->ngaynhaplk))}}</td>
                            <td>{!! nl2br(e($kk->ghichu)) !!}</td>
                            <td align="center">
                                @if($kk->trangthai == "Chờ chuyển")
                                    <span class="badge badge-warning">{{$kk->trangthai}}</span>
                                @elseif($kk->trangthai == 'Chờ duyệt')
                                    <span class="badge badge-blue">{{$kk->trangthai}}</span>
                                    <br>Thời gian nhận:<br><b>{{getDateTime($kk->ngaynhan)}}</b>
                                @elseif($kk->trangthai == 'Bị trả lại')
                                    <span class="badge badge-danger">{{$kk->trangthai}}</span><br>&nbsp;
                                @elseif($kk->trangthai == 'Duyệt')
                                    <span class="badge badge-success">{{$kk->trangthai}}</span>
                                @else
                                    <span class="badge badge-info">{{$kk->trangthai}}</span>
                                    <br>Thời gian chuyển:<br><b>{{getDateTime($kk->ngaychuyen)}}</b>
                                @endif
                            </td>

                            <td>
                                <button type="button" onclick="InChiTiet('{{$kk->masokk}}')" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Chi tiết</button>
                                @if($kk->trangthai == "Chờ chuyển")
                                    <a href="{{url($url.$kk->id)}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                    <button type="button" onclick="confirmDelete('{{$kk->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                    <button type="button" onclick="confirmChuyen('{{$kk->id}}')" class="btn btn-default btn-xs mbs" data-target="#chuyendvvt-modal-confirm" data-toggle="modal"><i class="fa fa-share-square-o"></i>&nbsp;Chuyển</button>
                                @elseif($kk->trangthai == 'Chờ nhận')
                                    <button type="button" onclick="TTNguoiChuyen('{{$kk->ttnguoinop}}')" class="btn btn-default btn-xs mbs" data-target="#chuyendvvt-modal-confirm" data-toggle="modal"><i class="fa fa-user"></i>&nbsp;Người chuyển</button>
                                @elseif($kk->trangthai == 'Bị trả lại')
                                    <a href="{{url($url.$kk->id)}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                    <button type="button" onclick="LyDoTraLai('{{$kk->lydo}}')" class="btn btn-default btn-xs mbs" data-target="#tradvvt-modal-confirm" data-toggle="modal"><i class="fa fa-list"></i>&nbsp;Lý do trả lại</button>
                                    <button type="button" onclick="confirmDelete('{{$kk->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                    <button type="button" onclick="confirmChuyen('{{$kk->id}}')" class="btn btn-default btn-xs mbs" data-target="#chuyendvvt-modal-confirm" data-toggle="modal"><i class="fa fa-share-square-o"></i>&nbsp;Chuyển</button>
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