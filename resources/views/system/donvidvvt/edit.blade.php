<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13/04/2016
 * Time: 3:44 PM
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
                {!! Form::model($model, ['method' => 'PATCH', 'url'=>'dvvantai/donvi/'. $model->id, 'class'=>'form-horizontal form-validate']) !!}
                <div class="form-group">
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-6 controls">
                        <h4>CHỈNH SỬA THÔNG TIN DOANH NGHIỆP CUNG CẤP DỊCH VỤ VẬN TẢI</h4>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Tên doanh nghiệp <span class="require">*</span> </label>
                    <div class="col-sm-6 controls">
                        {!!Form::text('tendonvi', null, array('id' => 'tendonvi','class' => 'form-control required','autofocus' => 'autofocus'))!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Mã số thuế <span class="require">*</span> </label>
                    <div class="col-sm-6 controls">
                        {!!Form::text('masothue', null, array('id' => 'masothue','class' => 'form-control required','readonly'))!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Địa chỉ<span class="require">*</span> </label>
                    <div class="col-sm-6 controls">
                        {!!Form::text('diachi', null, array('id' => 'diachi','class' => 'form-control required'))!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Điện thoại<span class="require">*</span> </label>
                    <div class="col-sm-6 controls">
                        {!!Form::text('dienthoai', null, array('id' => 'dienthoai','class' => 'form-control required'))!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Số Fax<span class="require">*</span> </label>
                    <div class="col-sm-6 controls">
                        {!!Form::text('fax', null, array('id' => 'fax','class' => 'form-control required'))!!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Nơi đăng ký nộp thuế<span class="require">*</span> </label>
                    <div class="col-sm-6 controls">
                        {!!Form::text('dknopthue', null, array('id' => 'dknopthue','class' => 'form-control required'))!!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Giấy phép kinh doanh<span class="require">*</span> </label>
                    <div class="col-sm-6 controls">
                        <textarea id="giayphepkd" class="form-control requiredl" name="giayphepkd" cols="30" rows="3" placeholder="Giấy chứng nhận kinh doanh số … do … cấp ngày … tháng …năm  ....">{{$model->giayphepkd}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Chức danh<span class="require">*</span> </label>
                    <div class="col-sm-6 controls">
                        {!!Form::text('chucdanh', null, array('id' => 'chucdanh','class' => 'form-control required'))!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Người ký<span class="require">*</span> </label>
                    <div class="col-sm-6 controls">
                        {!!Form::text('nguoiky', null, array('id' => 'nguoiky','class' => 'form-control required'))!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Địa danh<span class="require">*</span> </label>
                    <div class="col-sm-6 controls">
                        {!!Form::text('diadanh', null, array('id' => 'diadanh','class' => 'form-control required'))!!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-1 controls">

                    </div>
                    <label class="col-sm-2 control-label">Dịch vụ xe khách</label>
                    <div class="col-sm-1 controls">
                        {!!Form::checkbox('dvxk', 1, array('id' => 'dvxk','class' => 'form-control'))!!}
                    </div>

                    <label class="col-sm-2 control-label">Dịch vụ xe buýt</label>
                    <div class="col-sm-1 controls">
                        {!!Form::checkbox('dvxb', 1, array('id' => 'dvxb','class' => 'form-control'))!!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label"></label>

                    <label class="col-sm-2 control-label">Dịch vụ xe taxi</label>
                    <div class="col-sm-1 controls">
                        {!!Form::checkbox('dvxtx', 1, array('id' => 'dvxtx','class' => 'form-control'))!!}
                    </div>

                    <label class="col-sm-2 control-label">Dịch vụ chở hàng</label>
                    <div class="col-sm-1 controls">
                        {!!Form::checkbox('dvk', 1, array('id' => 'dvk','class' => 'form-control'))!!}
                    </div>
                </div>

                <div class="form-group mbn">
                    <div class="col-sm-12 controls" style="text-align: center;">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-plus"></i>&nbsp; Cập nhật
                        </button>
                        &nbsp;
                        <button type="reset" class="btn btn-default">Nhập lại</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function($) {
            $('input[name="masothue"]').change(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '/companydvlt/checkmasothue/'+$(this).val(),
                    data: {
                        _token: CSRF_TOKEN
                    },
                    success: function (respond) {
                        if(respond != 'ok'){
                            alert('Mã số thuế đã tồn tại!');
                            $('input[name="masothue"]').removeClass('valid').addClass('invalid')
                                    .parent().removeClass('state-success').addClass('state-error');
                        }else {
                            $('input[name="masothue"]').removeClass('invalid').addClass('valid')
                                    .parent().removeClass('state-error').addClass('state-success');
                        }
                    }

                });
            })
        }(jQuery));


    </script>
@stop
