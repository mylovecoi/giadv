<?php
/**
 * Created by PhpStorm.
 * User: MyloveCoi
 * Date: 22/04/2016
 * Time: 3:02 PM
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
@stop


@section('content-dv')
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="tabletrocap" class="table table-hover table-striped table-bordered table-advanced tablesorter">
                    <thead>
                    <tr>
                        <th style="width: 30%">Mô tả dịch vụ</th>
                        <th style="width: 15%">Mức giá vé lượt liền kề</th>
                        <th style="width: 15%">Mức giá vé lượt kê khai</th>
                        <th style="width: 15%">Mức giá vé tháng liền kề</th>
                        <th style="width: 15%">Mức giá vé tháng kê khai</th>
                        <th style="width: 10%">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody id="noidung">
                    @foreach($model as $dv)
                        <tr>
                            <td name="tendichvu">{{$dv->tendichvu}}</td>
                            <td name="giakklkluot">{{number_format($dv->giakklkluot)}}</td>
                            <td name="giakkluot">{{number_format($dv->giakkluot)}}</td>
                            <td name="giakklkthang">{{number_format($dv->giakklkthang)}}</td>
                            <td name="giakkthang">{{number_format($dv->giakkthang)}}</td>
                            <td>
                                <button type="button" data-target="#modal-create"
                                        data-toggle="modal" class="btn btn-default btn-xs mbs"
                                        onclick="editItem(this,'{{$dv->id}}')"><i
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
                    <div class="panel-heading"><b>KÊ KHAI GIÁ DỊCH VỤ VẬN TẢI HÀNH KHÁCH BẰNG XE BUÝT THEO TUYẾN CỐ ĐỊNH</b></div>
                    <div class="panel-body pan">
                        {!! Form::open(['url'=>'dvvantai/dvxb/kekhai/store', 'id' => 'create-kkdvxb', 'class'=>'horizontal-form form-validate','method'=>'patch']) !!}
                        <div class="form-body pal">
                            @include('quanly.dvvt.template.createkkdv')
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
                        <label class="form-control-label">Mức giá vé lượt kê khai liền kề<span class="require">*</span></label>
                        {!!Form::text('giakklkluot', null, array('id' => 'giakklkluot','class' => 'form-control','required'=>'required','data-mask'=>'fdecimal'))!!}

                        <label class="form-control-label">Mức giá vé lượt kê khai<span class="require">*</span></label>
                        {!!Form::text('giakkluot', null, array('id' => 'giakkluot','class' => 'form-control','required'=>'required','data-mask'=>'fdecimal'))!!}

                        <label class="form-control-label">Mức giá vé tháng kê khai liền kề<span class="require">*</span></label>
                        {!!Form::text('giakklkthang', null, array('id' => 'giakklkthang','class' => 'form-control','required'=>'required','data-mask'=>'fdecimal'))!!}

                        <label class="form-control-label">Mức giá vé tháng kê khai<span class="require">*</span></label>
                        {!!Form::text('giakkthang', null, array('id' => 'giakkthang','class' => 'form-control','required'=>'required','data-mask'=>'fdecimal'))!!}

                        <input type="hidden" id="iddv" name="iddv"/>
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
        function editItem(e, id){
            var tr=$(e).closest('tr');
            $('#giakklkluot').attr('value',tr.find('td[name=giakklkluot]').text());
            $('#giakkluot').attr('value',tr.find('td[name=giakkluot]').text());
            $('#giakklkthang').attr('value',tr.find('td[name=giakklkthang]').text());
            $('#giakkthang').attr('value',tr.find('td[name=giakkthang]').text());
            $('#iddv').attr('value',id);
        }

        function updategia(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/dvvantai/dvxb/kekhai/updategiadv',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    giakklkluot: $('#giakklkluot').val(),
                    giakkluot: $('#giakkluot').val(),
                    giakklkthang: $('#giakklkthang').val(),
                    giakkthang: $('#giakkthang').val(),
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

