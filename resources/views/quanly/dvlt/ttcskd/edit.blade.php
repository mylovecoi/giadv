@extends('main')

@section('custom-style')
    <!-- put the custom style for this page here -->
@stop


@section('custom-script')
    <!-- put the custom script for this page here -->
    <script type="text/javascript" src="{{ url('vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/form-validation.js') }}"></script>
    <script>
        function editItem(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/ajax/chinhsuaph',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    //console.log(data);
                    if(data.status == 'success') {
                        //console.log(data.message);
                        $('#ttphchinhsua').replaceWith(data.message);
                        $('#maloaipedit').focus();
                    }
                }
            })
        }

        function capnhatph(){
            //alert('vcl');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/ajax/capnhatph',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="idedit"]').val(),
                    //maloaip: $('input[name="maloaipedit"]').val(),
                    loaip: $('input[name="loaipedit"]').val(),
                    qccl: $('textarea[name="qccledit"]').val(),
                    sohieu: $('textarea[name="sohieuedit"]').val(),
                    ghichu: $('textarea[name="ghichuedit"]').val(),
                    macskd: $('input[name="macskd"]').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    //$('#modal-wide-width').dialog('close');
                    if(data.status == 'success') {
                        //console.log(data.message);
                        alert('Cập nhật thông tin thành công');
                        $('#ttphong').replaceWith(data.message);
                        $('#modal-wide-width').modal("hide");
                    }
                }
            })
        }

        function deleteRow(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/ajax/xoaph',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id,
                    macskd: $('input[id="macskd"]').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    //if(data.status == 'success') {
                    alert('Xóa thông tin thành công');
                    $('#ttphong').replaceWith(data.message);

                    //}
                }
            })

        }
    </script>

@stop

@section('content')
    <div class="page-content">
        <div id="" class="row">
            <div class="col-lg-12">
                <div class="panel panel">
                    <div class="panel-heading">Chính sửa kê khai thông tin cơ sở kinh doanh dịch vụ lưu trú</div>
                    <div class="panel-body pan">
                        {!! Form::model($model,['method' => 'PATCH','url'=>'ttcskddvlt/'.$model->id, 'class'=>'horizontal-form form-validate']) !!}
                        <div class="form-body pal"><b>Thông tin cơ sở kinh doanh</b>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label for="inputLastName" class="control-label">Tên cơ sở kinh doanh<span class="require">*</span></label>

                                        <div>{!!Form::text('tencskd', null, array('id' => 'tencskd','class' => 'form-control'))!!}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label for="inputEmail" class="control-label">Loại hạng
                                            <span class="require">*</span></label>
                                        <div>
                                            {!! Form::select(
                                            'loaihang',
                                            array(
                                            '1' => '1 sao',
                                            '1.5' => '1,5 sao',
                                            '2' => '2 sao',
                                            '2.5'=> '2,5 sao',
                                            '3'=> '3 sao',
                                            '3.5'=> '3,5 sao',
                                            '4'=> '4 sao',
                                            '4.5'=> '4,5 sao',
                                            '5' => '5 sao',
                                            'k' => 'Khác (Nhà nghỉ...)'
                                            ),null,
                                            array('id' => 'loaihang', 'class' => 'form-control'))
                                            !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label for="selGender" class="control-label">Địa chỉ kinh doanh
                                            <span class="require">*</span></label>
                                        <div>{!!Form::text('diachikd', null, array('id' => 'diachikd','class' => 'form-control'))!!}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label for="selGender" class="control-label">Số điện thoại cơ sở kinh doanh
                                            <span class="require">*</span></label>

                                        <div>{!!Form::text('telkd', null, array('id' => 'telkd','class' => 'form-control'))!!}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label for="selGender" class="control-label">Tọa độ Google Map
                                            </label>
                                        <div>{!!Form::text('toado', null, array('id' => 'toado','class' => 'form-control'))!!}</div>
                                    </div>
                                </div>
                            </div>
                            {!!Form::hidden('macskd', null, array('id' => 'macskd','class' => 'form-control'))!!}

                            <b>Thông tin phòng-chất lượng quy cách</b>

                            <div class="row">
                                <!--div class="col-md-6">
                                    <div class="form-group"><label for="selGender" class="control-label">Ký hiệu loại phòng
                                            <span class="require">*</span></label>
                                        <div><input type="text" name="maloaip" id="maloaip" class="form-control"></div>
                                    </div>
                                </div-->
                                <div class="col-md-6">
                                    <div class="form-group"><label for="selGender" class="control-label">Loại phòng
                                            <span class="require">*</span></label>
                                        <div><input type="text" name="loaip" id="loaip" class="form-control"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label for="selGender" class="control-label">Quy cách chất lượng
                                            <span class="require">*</span></label>
                                        <div>
                                            <textarea id="qccl" class="form-control" name="qccl" cols="30" rows="3"></textarea>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label for="selGender" class="control-label">Số hiệu phòng
                                            <span class="require">*</span></label>
                                        <div>
                                            <textarea id="sohieu" class="form-control" name="sohieu" cols="30" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label for="selGender" class="control-label">Ghi chú
                                            <span class="require">*</span></label>
                                        <div>
                                            <textarea id="ghichu" class="form-control" name="ghichu" cols="30" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="button" id="capnhatph" name="capnhatph" class="btn btn-warning"><i class="fa fa-angle-double-down"></i>&nbsp;Cập nhật</button>
                                        &nbsp;
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="tabletrocap" class="table table-hover table-striped table-bordered table-advanced tablesorter">
                                            <thead>
                                            <tr>
                                                <!--th>Ký hiệu loại phòng</th-->
                                                <th width="10%">Loại phòng</th>
                                                <th width="30%">Quy cách chất lượng</th>
                                                <th width="30%">Số hiệu phòng</th>
                                                <th>Ghi chú</th>
                                                <th width="15%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody id="ttphong">
                                                @foreach($modelph as $ph)
                                                    <tr>
                                                        <!--td>{{$ph->maloaip}}</td-->
                                                        <td>{{$ph->loaip}}</td>
                                                        <td>{{$ph->qccl}}</td>
                                                        <td>{{$ph->sohieu}}</td>
                                                        <td>{{$ph->ghichu}}</td>
                                                        <td>
                                                            <button type="button" data-target="#modal-wide-width" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem({{$ph->id}});"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>
                                                            <button type="button" class="btn btn-default btn-xs mbs" onclick="deleteRow({{$ph->id}})" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions text-right pal">
                            <div class="col-sm-12" align="center" >
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;Hoàn thành</button>
                                &nbsp;
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.script.create-header-scripts')
    <script>
        jQuery(document).ready(function($) {
            $('button[name="capnhatph"]').click(function(){
                //alert($('input[name="tents"]').val());
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/ajax/themmoiph',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        //maloaip: $('input[name="maloaip"]').val(),
                        loaip: $('input[name="loaip"]').val(),
                        qccl: $('textarea[name="qccl"]').val(),
                        sohieu: $('textarea[name="sohieu"]').val(),
                        ghichu: $('textarea[name="ghichu"]').val(),
                        macskd: $('input[id="macskd"]').val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        //console.log(data);
                        //alert(data.message);
                         if(data.status == 'success') {
                             alert('Cập nhật thông tin thành công');
                             $('#ttphong').replaceWith(data.message);
                             //$('#maloaip').val('');
                             $('#loaip').val('');
                             $('#qccl').val('');
                             $('#sohieu').val('');
                             $('#ghichu').val('');
                             $('#loaip').focus();
                        }
                    }
                })
            });
        }(jQuery));
    </script>

    <!--Modal Wide Width-->
    <div id="modal-wide-width" tabindex="-1" role="dialog" aria-labelledby="modal-wide-width-label"
         aria-hidden="true" class="modal fade">
        <div class="modal-dialog modal-wide-width">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Chỉnh sửa thông tin phòng- chất lượng quy cách</h4>
                </div>
                <div class="modal-body" id="ttphchinhsua">

                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="capnhatph()">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
@stop