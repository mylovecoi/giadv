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
                        <th style="width: 25%">Đơn vị kê khai</th>
                        <th style="width: 10%">Ngày kê khai</th>
                        <th style="width: 10%">Áp dụng từ ngày</th>
                        <th style="width: 15%">Số công văn</th>
                        <th style="width: 15%">Thông tin người nộp</th>
                        <th style="width: 15%">Trạng thái</th>
                        <th style="width: 10%">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($model as $kk)
                        <tr>
                            <td><input type="checkbox" type="checkbox" name = "ck_value"  id="ck_value" value="{{$kk->id}}"/></td>
                            <td>{{$kk->tendonvi}}</td>
                            <td>{{getDayVn($kk->ngaynhap)}}</td>
                            <td>{{getDayVn($kk->ngayhieuluc)}}</td>
                            <td>{{$kk->socv}}
                                @if($kk->trangthai == 'Chờ duyệt')
                                    <br>Số hồ sơ:<br><b>{{$kk->sohsnhan}}</b>
                                    <br>Thời gian nhận:<br><b>{{getDayVn($kk->ngaynhan)}}</b>
                                @endif
                            </td>
                            <td>{{$kk->ttnguoinop}}
                            </td>
                            <td align="center">

                                @if($kk->trangthai == 'Chờ duyệt')
                                    <span class="badge badge-blue">{{$kk->trangthai}}</span>
                                    <br>Thời gian nhận:<br><b>{{getDayVn($kk->ngaynhan)}}</b>
                                @elseif($kk->trangthai == 'Duyệt')
                                    <span class="badge badge-success">{{$kk->trangthai}}</span>
                                @elseif($kk->trangthai == 'Chờ nhận')
                                    <span class="badge badge-info">{{$kk->trangthai}}</span>
                                    <br>Thời gian chuyển:<br><b>{{getDateTime($kk->ngaychuyen)}}</b>
                                @elseif($kk->trangthai == 'Đang công bố')
                                    <span class="badge badge-success">{{$kk->trangthai}}</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" onclick="InChiTiet('{{$kk->masokk}}')" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Chi tiết</button>
                                @if($kk->trangthai == 'Chờ nhận')
                                    <button type="button" onclick="TTNguoiChuyen('{{$kk->ttnguoinop}}')" class="btn btn-default btn-xs mbs" data-target="#chuyendvvt-modal-confirm" data-toggle="modal"><i class="fa fa-user"></i>&nbsp;Người chuyển</button>
                                    <button type="button" onclick="confirmNhan('{{$kk->id}}')" class="btn btn-default btn-xs mbs" data-target="#nhandvvt-modal-confirm" data-toggle="modal"><i class="fa fa-share-square-o"></i>&nbsp;Nhận hồ sơ</button>
                                    <button type="button" onclick="confirmTraLai('{{$kk->id}}')" class="btn btn-default btn-xs mbs" data-target="#tradvvt-modal-confirm" data-toggle="modal"><i class="fa fa-share-square-o"></i>&nbsp;Trả lại</button>
                                @elseif($kk->trangthai == 'Chờ duyệt')
                                    <button type="button" onclick="comfirmDuyet('{{$kk->id}}')" class="btn btn-default btn-xs mbs" data-target="#duyeths-modal-confirm" data-toggle="modal"><i class="fa fa-check-square"></i>&nbsp;Duyệt hồ sơ</button>
                                    <button type="button" onclick="confirmTraLai('{{$kk->id}}')" class="btn btn-default btn-xs mbs" data-target="#tradvvt-modal-confirm" data-toggle="modal"><i class="fa fa-share-square-o"></i>&nbsp;Trả lại</button>
                                    <button type="button" onclick="confirmNhanCS('{{$kk->id.'?'.$kk->sohsnhan.'?'.$kk->ngaynhan}}')" class="btn btn-default btn-xs mbs" data-target="#nhandvvt-modal-confirm" data-toggle="modal"><i class="fa fa-share-square-o"></i>&nbsp;Chỉnh sửa</button>
                                @elseif($kk->trangthai == 'Đã công bố')
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