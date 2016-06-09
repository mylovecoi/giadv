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
                url: '/ajax/editgiaph',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        $('#ttgiaph').replaceWith(data.message);
                        $('#mucgialk').focus();
                        InputMask();
                    }
                }
            })
        }
        function editTtPh(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/ajax/editkkgttph',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        $('#ttphedit').replaceWith(data.message);
                    }
                }
            })
        }
        function updateTtPh(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/ajax/updatekkgttph',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="idedit"]').val(),
                    loaip: $('input[name="loaipedit"]').val(),
                    qccl: $('textarea[name="qccledit"]').val(),
                    sohieu: $('textarea[name="sohieuedit"]').val(),
                    ghichu: $('textarea[name="ghichuedit"]').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        toastr.success("Cập nhật thông tin thành công!");
                        $('#ttphong').replaceWith(data.message);
                        $('#modal-edit').modal("hide");

                    }
                }
            })
        }
        function updategiaph(){
            //alert('vcl');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/ajax/updategiaph',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="idedit"]').val(),
                    mucgialk: $('input[name="mucgialk"]').val(),
                    mucgiakk: $('input[name="mucgiakk"]').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    //$('#modal-wide-width').dialog('close');
                    if(data.status == 'success') {
                        toastr.success("Cập nhật thông tin thành công!");
                        $('#ttphong').replaceWith(data.message);
                        $('#modal-create').modal("hide");
                    }
                }
            })
        }
        function del(id){
            document.getElementById("iddelete").value = id;
        }
        function delttph(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/ajax/delkkgttph',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="iddelete"]').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        //alert('Cập nhật thông tin thành công');
                        toastr.info("Xóa thông tin thành công!");
                        $('#ttphong').replaceWith(data.message);
                        $('#modal-delete').modal("hide");
                    }
                }
            })
        }
        function themmoittph(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/ajax/themmoikkgttph',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    loaip: $('input[name="loaip"]').val(),
                    qccl: $('textarea[name="qccl"]').val(),
                    sohieu: $('textarea[name="sohieu"]').val(),
                    ghichu: $('textarea[name="ghichuttph"]').val(),
                    macskd: $('input[name="macskd"]').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        toastr.success("Bổ xung thông tin thành công!");
                        $('#ttphong').replaceWith(data.message);
                        $('#modal-themmoi').modal("hide");

                    }
                }
            })
        }
        function clearForm(){
            $('#loaip').val('');
            $('#qccl').val('');
            $('#sohieu').val('');
            $('#ghichuttph').val('');
        }

        // <editor-fold defaultstate="collapsed" desc="--InPutMask--">
        function InputMask(){
            //$(function(){
            // Input Mask
            if($.isFunction($.fn.inputmask))
            {
                $("[data-mask]").each(function(i, el)
                {
                    var $this = $(el),
                            mask = $this.data('mask').toString(),
                            opts = {
                                numericInput: attrDefault($this, 'numeric', false),
                                radixPoint: attrDefault($this, 'radixPoint', ''),
                                rightAlignNumerics: attrDefault($this, 'numericAlign', 'left') == 'right'
                            },
                            placeholder = attrDefault($this, 'placeholder', ''),
                            is_regex = attrDefault($this, 'isRegex', '');


                    if(placeholder.length)
                    {
                        opts[placeholder] = placeholder;
                    }

                    switch(mask.toLowerCase())
                    {
                        case "phone":
                            mask = "(999) 999-9999";
                            break;

                        case "currency":
                        case "rcurrency":

                            var sign = attrDefault($this, 'sign', '$');;

                            mask = "999,999,999.99";

                            if($this.data('mask').toLowerCase() == 'rcurrency')
                            {
                                mask += ' ' + sign;
                            }
                            else
                            {
                                mask = sign + ' ' + mask;
                            }

                            opts.numericInput = true;
                            opts.rightAlignNumerics = false;
                            opts.radixPoint = '.';
                            break;

                        case "email":
                            mask = 'Regex';
                            opts.regex = "[a-zA-Z0-9._%-]+@[a-zA-Z0-9-]+\\.[a-zA-Z]{2,4}";
                            break;

                        case "fdecimal":
                            mask = 'decimal';
                            $.extend(opts, {
                                autoGroup		: true,
                                groupSize		: 3,
                                radixPoint		: attrDefault($this, 'rad', '.'),
                                groupSeparator	: attrDefault($this, 'dec', ',')
                            });
                    }

                    if(is_regex)
                    {
                        opts.regex = mask;
                        mask = 'Regex';
                    }

                    $this.inputmask(mask, opts);
                });
            }
            //});
        }
        // </editor-fold>

    </script>

@stop

@section('content')
    <div class="page-content">
        <div id="" class="row">
            <div class="col-lg-12">
                <div class="panel panel">
                    <div class="panel-heading">Kê khai giá dịch vụ lưu trú</div>

                    <div class="panel-body pan">
                        {!! Form::open(['url'=>'kkgdvlt/'.$modelcskd->id, 'id' => 'create-kkgdvlt', 'class'=>'horizontal-form form-validate']) !!}
                        <div class="form-body pal">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label for="inputLastName" class="control-label">Ngày kê khai<span class="require">*</span></label>
                                        <div>
                                            <input type="date" name="ngaynhap" id="ngaynhap" class="form-control required" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label for="selGender" class="control-label">Ngày thực hiện mức giá kê khai</label>
                                        <div><input type="date" name="ngayhieuluc" id="ngayhieuluc" class="form-control"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label for="inputEmail" class="control-label">Số công văn
                                            <span class="require">*</span></label>
                                        <div>
                                            <input type="text" name="socv" id="socv" class="form-control required">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label for="inputEmail" class="control-label">Số công văn liền kề
                                            </label>
                                        <div>
                                            <input type="text" name="socvlk" id="socvlk" class="form-control" value="{{isset($modelcb) ? $modelcb->socv : '' }}">
                                            <!--Bổ xung sau-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label for="inputEmail" class="control-label">Ngày nhập số công văn liền kề
                                            </label>
                                        <div>
                                            <div><input type="date" name="ngaycvlk" id="ngaycvlk" class="form-control" value="{{isset($modelcb) ? $modelcb->ngaynhap : '' }}"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="macskd" id="macskd" value="{{$modelcskd->macskd}}">
                            <div class="row mbm">
                                <div class="col-md-6">
                                    <button type="button" data-target="#modal-themmoi" data-toggle="modal" class="btn btn-success btn-xs" onclick="clearForm()"><i class="fa fa-plus"></i>&nbsp;Kê khai bổ xung phòng</button><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="tabletrocap" class="table table-hover table-striped table-bordered table-advanced tablesorter">
                                            <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th width="30%">Loại phòng<br>Quy cách chất lượng</th>
                                                <th width="30%">Số hiệu phòng</th>
                                                <th width="16%">Ghi chú</th>
                                                <th width="7%">Mức giá liền kề</th>
                                                <th width="7%">Mức giá kê khai</th>
                                                <th>Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody id="ttphong">
                                            @foreach($modeldsph as $key=>$ph)
                                                <tr>
                                                    <td align="center">{{$key + 1}}</td>
                                                    <td>{{$ph->loaip.'-'.$ph->qccl}}</td>
                                                    <td>{{$ph->sohieu}}</td>
                                                    <td>{{$ph->ghichu}}</td>
                                                    <td align="right">{{number_format($ph->mucgialk)}}</td>
                                                    <td align="right">{{number_format($ph->mucgiakk)}}</td>
                                                    <td>
                                                        <button type="button" data-target="#modal-create" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem({{$ph->id}});"><i class="fa fa-edit"></i>&nbsp;Kê khai giá</button>
                                                        <button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editTtPh({{$ph->id}});"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>
                                                        <button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="del({{$ph->id}});" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label for="selGender" class="control-label">Thông tin kê khai</label>
                                        <div>
                                        <textarea id="ghichu" class="form-control" name="ghichu" cols="30" rows="10"
                                                  placeholder="-Phụ thu, Thuế VAT"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-actions text-right pal">
                            <div class="col-sm-12" align="center" >
                                <button type="submit" class="btn btn-primary">Hoàn thành</button>
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

    <!--Modal-create-giaph-->
    <div id="modal-create" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Kê khai giá phòng</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal" id="ttgiaph">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="updategiaph()" >Đồng ý</button>
                </div>
            </div>
        </div>
    </div>
    <!--Modal-edit-ttphong-->
    <div id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-wide-width-label"
         aria-hidden="true" class="modal fade">
        <div class="modal-dialog modal-wide-width">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Chỉnh sửa thông tin phòng- chất lượng quy cách</h4>
                </div>
                <div class="modal-body" id="ttphedit">

                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="updateTtPh()">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
    <!--Modal-delete-ttph-->
    <div id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form id="frmDelete" method="GET" action="#" accept-charset="UTF-8">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                class="close">&times;</button>
                        <h4 id="modal-header-primary-label" class="modal-title">Đồng ý xoá?</h4>
                        <input type="hidden" name="iddelete" id="iddelete">
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                        <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="delttph()">Đồng ý</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--Modal-edit-themmoi-->
    <div id="modal-themmoi" tabindex="-1" role="dialog" aria-labelledby="modal-wide-width-label"
         aria-hidden="true" class="modal fade">
        <div class="modal-dialog modal-wide-width">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Kê khai bổ xung thông tin phòng- chất lượng quy cách</h4>
                </div>
                <div class="modal-body" id="ttphedit">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label">Loại phòng<span class="require">*</span></label>
                                <div><input type="text" name="loaip" id="loaip" class="form-control"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label">Quy cách chất lượng<span class="require">*</span></label>
                                <div><textarea id="qccl" class="form-control" name="qccl" cols="30" rows="5"></textarea></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label">Số hiệu<span class="require">*</span></label>
                                <div><textarea id="sohieu" class="form-control" name="sohieu" cols="30" rows="5"></textarea></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"><label for="selGender" class="control-label">Ghi chú<span class="require">*</span></label>
                                <div><textarea id="ghichuttph" class="form-control" name="ghichuttph" cols="30" rows="3"></textarea></div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="themmoittph()">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
@stop
