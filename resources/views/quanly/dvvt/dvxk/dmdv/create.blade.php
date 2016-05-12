<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 4/16/2016
 * Time: 10:56 PM
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

@section('content')
    <div class="page-content">
        <div id="" class="row">
            <div class="col-lg-12">
                <div class="portlet box">
                    <div class="portlet-header">
                        <div class="caption">
                            <b>THÊM MỚI DỊCH VỤ VẬN TẢI</b>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="panel">
                            <div class="panel-body pan">
                                {!! Form::open(['url'=>'dvvantai/dvxekhach', 'id' => 'create-dmdvvtxk', 'class'=>'form-horizontal form-validate']) !!}
                                <meta name="csrf-token" content="{{ csrf_token() }}" />
                                <div class="portlet-body">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Mã dịch vụ<span
                                                    class="require">*</span>
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <input id="madichvu" class="form-control required" name="madichvu" type="text" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Tên dịch vụ<span
                                                    class="require">*</span>
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <input id="tendichvu" class="form-control required" name="tendichvu" type="text" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Quy cách chất lượng dịch vụ
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <textarea id="qccl" class="form-control" name="qccl" cols="30" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Đơn vị tính
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <input id="dvt" class="form-control required" name="dvt" type="text" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Ghi chú
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <textarea id="ghichu" class="form-control" name="ghichu" cols="30" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12" align="center" >
                                            <button type="submit" class="btn btn-primary">Đồng ý</button>
                                            &nbsp;
                                            <button type="reset" class="btn btn-default">Nhập lại</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function($) {
            $('input[name="madichvu"]').change(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '/dvvantai/chkdvxk/'+$(this).val(),
                    data: {
                        _token: CSRF_TOKEN
                    },
                    success: function (respond) {
                        if(respond != 'ok'){
                            alert('Mã số dịch vụ đã tồn tại!');
                            $('input[name="madichvu"]').removeClass('valid').addClass('invalid')
                                    .parent().removeClass('state-success').addClass('state-error');
                        }else {
                            $('input[name="madichvu"]').removeClass('invalid').addClass('valid')
                                    .parent().removeClass('state-error').addClass('state-success');
                        }
                    }
                });
            })
        }(jQuery));
    </script>
@stop

