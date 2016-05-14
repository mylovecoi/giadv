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
                url: '/ajax/chinhsuagiaph',
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

        function updategiaph(){
            //alert('vcl');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/ajax/capnhatgiaph',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="idct"]').val(),
                    mahs: $('input[name="mahsct"]').val(),
                    mucgialk: $('input[name="mucgialk"]').val(),
                    mucgiakk: $('input[name="mucgiakk"]').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        //alert(data.message);
                        alert('Cập nhật thông tin thành công');
                        $('#ttphong').replaceWith(data.message);
                        $('#modal-wide-width').modal("hide");

                    }
                }
            })
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
                    <div class="panel-heading">Chỉnh sửa kê khai giá dịch vụ lưu trú</div>
                    <div class="panel-body pan">
                        {!! Form::model($model,['method' => 'PATCH','url'=>'kkgdvlt/'.$modelcskd->id.'/'.$model->id, 'class'=>'horizontal-form form-validate']) !!}
                        <div class="form-body pal">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label for="inputLastName" class="control-label">Ngày kê khai<span class="require">*</span></label>
                                        <div>
                                            <input type="date" name="ngaynhap" id="ngaynhap" class="form-control required" value="{{$model->ngaynhap}}" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label for="selGender" class="control-label">Ngày thực hiện mức giá kê khai</label>
                                        <div><input type="date" name="ngayhieuluc" id="ngayhieuluc" class="form-control required" value="{{$model->ngayhieuluc}}"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label for="inputEmail" class="control-label">Số công văn
                                            <span class="require">*</span></label>
                                        <div>
                                            <input type="text" name="socv" id="socv" class="form-control required" value="{{$model->socv}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label for="inputEmail" class="control-label">Số công văn liền kề
                                            <span class="require">*</span></label>
                                        <div>
                                            <input type="text" name="socvlk" id="socvlk" class="form-control required" value="{{$model->socvlk}}">
                                            <!--Bổ xung sau-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label for="inputEmail" class="control-label">Ngày nhập số công văn liền kề
                                            <span class="require">*</span></label>
                                        <div>
                                            <div><input type="date" name="ngaycvlk" id="ngaycvlk" class="form-control required" value="{{$model->ngaycvlk}}"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="macskd" id="macskd" value="{{$modelcskd->macskd}}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="tabletrocap" class="table table-hover table-striped table-bordered table-advanced tablesorter">
                                            <thead>
                                            <tr>
                                                <th>Loại phòng<br>Quy cách chất lượng</th>
                                                <th>Số hiệu phòng</th>
                                                <th>Mức giá liền kề</th>
                                                <th>Mức giá kê khai</th>
                                                <th>Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody id="ttphong">
                                                @foreach($modelgiaph as $ph)
                                                <tr>
                                                    <td>{{$ph->loaip.'-'.$ph->qccl}}</td>
                                                    <td>{{$ph->sohieu}}</td>
                                                    <td>{{number_format($ph->mucgialk)}}</td>
                                                    <td>{{number_format($ph->mucgiakk)}}</td>
                                                    <td>
                                                        <button type="button" data-target="#modal-create" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem({{$ph->id}});"><i class="fa fa-edit"></i>&nbsp;Kê khai giá</button>
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
                                        <textarea id="giayphepkddn" class="form-control" name="giayphepkddn" cols="30" rows="3"
                                                  placeholder="-Phụ thu, Thuế VAT">{{$model->ghichu}}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-actions text-right pal">
                            <div class="col-sm-12" align="center" >
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
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

    <!--Modal Wide Width-->
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
@stop
