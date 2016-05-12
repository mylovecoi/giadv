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
                {!! Form::model($model, ['method' => 'PATCH', 'url'=>'dndvvt/'. $model->id, 'class'=>'form-horizontal form-validate']) !!}
                <div class="form-group">
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-6 controls">
                        <h4>CHỈNH SỬA THÔNG TIN DOANH NGHIỆP CUNG CẤP DỊCH VỤ VẬN TẢI</h4>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Tên doanh nghiệp <span class="require">*</span> </label>
                    <div class="col-sm-6 controls">
                        {!!Form::text('tendn', null, array('id' => 'tendn','class' => 'form-control required','autofocus' => 'autofocus'))!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Mã số thuế <span class="require">*</span> </label>
                    <div class="col-sm-6 controls">
                        {!!Form::text('masothue', null, array('id' => 'masothue','class' => 'form-control required','readonly'))!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Địa chỉ trụ sở</label>
                    <div class="col-sm-6 controls">
                        {!!Form::text('diachidn', null, array('id' => 'diachidn','class' => 'form-control'))!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Điện thoại trụ sở</label>
                    <div class="col-sm-6 controls">
                        {!!Form::text('dienthoaidn', null, array('id' => 'dienthoaidn','class' => 'form-control'))!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Số Fax trụ sở</label>
                    <div class="col-sm-6 controls">
                        {!!Form::text('faxdn', null, array('id' => 'faxdn','class' => 'form-control'))!!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Nơi đăng ký nộp thuế</label>
                    <div class="col-sm-6 controls">
                        {!!Form::text('noidknopthuedn', null, array('id' => 'noidknopthuedn','class' => 'form-control'))!!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Giấy phép kinh doanh</label>
                    <div class="col-sm-6 controls">
                        <textarea id="giayphepkddn" class="form-control" name="giayphepkddn" cols="30" rows="3" placeholder="Giấy chứng nhận kinh doanh số … do … cấp ngày … tháng …năm  ....">{{$model->giayphepkd}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Chức danh</label>
                    <div class="col-sm-6 controls">
                        {!!Form::text('chucdanhky', null, array('id' => 'chucdanhky','class' => 'form-control'))!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Người ký</label>
                    <div class="col-sm-6 controls">
                        {!!Form::text('nguoiky', null, array('id' => 'nguoiky','class' => 'form-control'))!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Địa danh</label>
                    <div class="col-sm-6 controls">
                        {!!Form::text('diadanh', null, array('id' => 'diadanh','class' => 'form-control'))!!}
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
                    url: '/donvidvlt/checkmasothue/'+$(this).val(),
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

