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
                            <b>THÊM MỚI DOANH NGHIỆP CUNG CẤP DỊCH VỤ VẬN TẢI</b>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="panel">
                            <div class="panel-body pan">
                                {!! Form::open(['url'=>'dvvantai/donvi', 'class'=>'form-horizontal form-validate']) !!}
                                <meta name="csrf-token" content="{{ csrf_token() }}" />
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tên doanh nghiệp <span class="require">*</span> </label>
                                    <div class="col-sm-6 controls">
                                        <input id="tendonvi" type="text" name="tendonvi" class="form-control required" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Mã số thuế <span class="require">*</span> </label>
                                    <div class="col-sm-6 controls">
                                        <input id="masothue" type="text" name="masothue" class="form-control required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Địa chỉ<span class="require">*</span> </label>
                                    <div class="col-sm-6 controls">
                                        <input id="diachi" type="text" name="diachi" class="form-control required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Điện thoại<span class="require">*</span> </label>
                                    <div class="col-sm-6 controls">
                                        <input id="dienthoai" type="text" name="dienthoai" class="form-control required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Số Fax<span class="require">*</span> </label>
                                    <div class="col-sm-6 controls">
                                        <input id="fax" type="text" name="fax" class="form-control required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nơi đăng ký nộp thuế<span class="require">*</span> </label>
                                    <div class="col-sm-6 controls">
                                        <input id="dknopthue" type="text" name="dknopthue" class="form-control required">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Giấy phép kinh doanh<span class="require">*</span> </label>
                                    <div class="col-sm-6 controls">
                                        <textarea id="giayphepkd" class="form-control requiredl" name="giayphepkd" cols="30" rows="3" placeholder="Giấy chứng nhận kinh doanh số … do … cấp ngày … tháng …năm  ...."></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Chức danh<span class="require">*</span> </label>
                                    <div class="col-sm-6 controls">
                                        <input id="chucdanh" type="text" name="chucdanh" class="form-control required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Người ký<span class="require">*</span> </label>
                                    <div class="col-sm-6 controls">
                                        <input id="nguoiky" type="text" name="nguoiky" class="form-control required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Địa danh<span class="require">*</span> </label>
                                    <div class="col-sm-6 controls">
                                        <input id="diadanh" type="text" name="diadanh" class="form-control required">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Doanh nghiệp cung cấp dịch vụ</label>
                                    <div class="col-sm-8 ">
                                        <div class="row">
                                            <div class="mbm col-sm-3">
                                                <label>
                                                    <input type="checkbox" value="1" name="roles[dvxk][index]"/> &nbsp; Dịch vụ xe khách
                                                </label>
                                            </div>
                                            <div class="mbm col-sm-3">
                                                <label>
                                                    <input type="checkbox" value="1" name="roles[dvxb][index]"/> &nbsp; Dịch vụ xe buýt
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"></label>
                                    <div class="col-sm-8 ">
                                        <div class="row">
                                            <div class="mbm col-sm-3">
                                                <label>
                                                    <input type="checkbox"  value="1" name="roles[dvxtx][index]"/> &nbsp; Dịch vụ xe taxi
                                                </label>
                                            </div>
                                            <div class="mbm col-sm-3">
                                                <label>
                                                    <input type="checkbox"  value="1" name="roles[dvxch][index]"/> &nbsp; Dịch vụ xe chở hàng
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tài khoản Admin <span class="require">*</span> </label>
                                    <div class="col-sm-6 controls">
                                        <input id="username" type="text" name="username" class="form-control required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Mật khẩu <span class="require">*</span> </label>
                                    <div class="col-sm-6 controls">
                                        <input id="password" type="text" name="password" class="form-control required">
                                    </div>
                                </div>
                                <div class="form-group mbn">
                                    <div class="col-sm-12" align="center" >
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-plus"></i>&nbsp; Thêm mới
                                        </button>
                                        &nbsp;
                                        <button type="reset" class="btn btn-default">Nhập lại</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div
                </div>
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function($) {
            $('input[name="masothue"]').change(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '/dvvantai/chkmasothue/'+$(this).val(),
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
            //kiểm tra người dùng
            $('input[name="username"]').change(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '/dvvantai/chkuser/'+$(this).val(),
                    data: {
                        _token: CSRF_TOKEN
                    },
                    success: function (respond) {
                        if(respond != 'ok'){
                            alert('Username đã tồn tại!');
                            $('input[name="username"]').removeClass('valid').addClass('invalid')
                                    .parent().removeClass('state-success').addClass('state-error');
                        }else {
                            $('input[name="username"]').removeClass('invalid').addClass('valid')
                                    .parent().removeClass('state-error').addClass('state-success');
                        }
                    }

                });
            })
        }(jQuery));
    </script>

@stop

