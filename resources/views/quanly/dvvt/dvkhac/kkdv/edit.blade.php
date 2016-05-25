<?php
/**
 * Created by PhpStorm.
 * User: MyloveCoi
 * Date: 18/04/2016
 * Time: 10:44 AM
 */
        ?>
@extends('main')

@section('custom-style')
    <!-- put the custom style for this page here -->
@stop


@section('custom-script')
    <!-- put the custom script for this page here -->
    <script type="text/javascript" src="{{ url('vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/form-validation.js') }}"></script>
    <script>
        // <editor-fold defaultstate="collapsed" desc="--InPutMask--">
        function InputMask() {
            //$(function(){
            // Input Mask
            if ($.isFunction($.fn.inputmask)) {
                $("[data-mask]").each(function (i, el) {
                    var $this = $(el),
                            mask = $this.data('mask').toString(),
                            opts = {
                                numericInput: attrDefault($this, 'numeric', false),
                                radixPoint: attrDefault($this, 'radixPoint', ''),
                                rightAlignNumerics: attrDefault($this, 'numericAlign', 'left') == 'right'
                            },
                            placeholder = attrDefault($this, 'placeholder', ''),
                            is_regex = attrDefault($this, 'isRegex', '');


                    if (placeholder.length) {
                        opts[placeholder] = placeholder;
                    }

                    switch (mask.toLowerCase()) {
                        case "phone":
                            mask = "(999) 999-9999";
                            break;

                        case "currency":
                        case "rcurrency":

                            var sign = attrDefault($this, 'sign', '$');
                            ;

                            mask = "999,999,999.99";

                            if ($this.data('mask').toLowerCase() == 'rcurrency') {
                                mask += ' ' + sign;
                            }
                            else {
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
                                autoGroup: true,
                                groupSize: 3,
                                radixPoint: attrDefault($this, 'rad', '.'),
                                groupSeparator: attrDefault($this, 'dec', ',')
                            });
                    }

                    if (is_regex) {
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

@section('content-dv')
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="tabletrocap" class="table table-hover table-striped table-bordered table-advanced tablesorter">
                    <thead>
                    <tr>
                        <th>Loại xe</th>
                        <th>Mô tả dịch vụ</th>
                        <th>Mức giá liền kề</th>
                        <th>Mức giá kê khai</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody id="noidung">
                    @foreach($modeldv as $dv)
                        <tr>
                            <td name="loaixe">{{$dv->loaixe}}</td>
                            <td name="tendichvu">{{$dv->tendichvu}}</td>
                            <td name="giakklk">{{number_format($dv->giakklk)}}</td>
                            <td name="giakk">{{number_format($dv->giakk)}}</td>
                            <td>
                                <button type="button" data-target="#modal-create"
                                        data-toggle="modal" class="btn btn-default btn-xs mbs"
                                        onclick="editItem(this,'{{$dv->id}}','{{$dv->masokk}}')"><i
                                            class="fa fa-edit"></i>&nbsp;Kê khai giá
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="page-content">
        <div id="" class="row">
            <div class="col-lg-12">
                <div class="panel panel">
                    <div class="panel-heading">Kê khai giá dịch vụ vận tải xe taxi</div>
                    <div class="panel-body pan">
                        {!! Form::open(['url'=>'dvvantai/dvkhac/kekhai/update/'.$model->id, 'id' => 'create-dvkhac','class'=>'horizontal-form form-validate','method'=>'patch']) !!}
                        <div class="form-body pal">
                            @include('quanly.dvvt.template.editkkdv')
                        </div>

                        <div class="form-actions text-right pal">
                            <div class="col-sm-12" align="center">
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

    <!--Modal Wide Width-->
    <div id="modal-create" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Kê khai giá dịch vụ</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal" id="ttgiaph">
                        <label class="form-control-label">Mức giá kê khai liền kề<span class="require">*</span></label>
                        {!!Form::text('giakklk', null, array('id' => 'giakklk','class' => 'form-control','required'=>'required','data-mask'=>'fdecimal'))!!}

                        <label class="form-control-label">Mức giá kê khai<span class="require">*</span></label>
                        {!!Form::text('giakk', null, array('id' => 'giakk','class' => 'form-control','required'=>'required','data-mask'=>'fdecimal'))!!}

                        <input type="hidden" id="iddv" name="iddv"/>
                        <input type="hidden" id="makk" name="makk"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="updategia()">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function editItem(e, id, makk){
            var tr=$(e).closest('tr');
            $('#giakklk').attr('value',tr.find('td[name=giakklk]').text());
            $('#giakk').attr('value',tr.find('td[name=giakk]').text());
            $('#iddv').attr('value',id);
            $('#makk').attr('value',makk);
        }

        function updategia(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/dvvantai/dvkhac/kekhai/updategiadvct',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    masokk:$('#makk').val(),
                    giakklk: $('#giakklk').val(),
                    giakk: $('#giakk').val(),
                    id: $('#iddv').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    //alert(data.message);
                    if (data.status == 'success') {
                        $('#noidung').replaceWith(data.message);
                        InputMask();
                    }
                },
                error: function(message){
                    alert(message);
                }
            });
        }
    </script>
@stop

