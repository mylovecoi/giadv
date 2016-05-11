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
                            <b>KÊ KHAI DOANH NGHIỆP CUNG CẤP DỊCH VỤ LƯU TRÚ</b>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="panel">
                            <div class="panel-body pan">
                        {!! Form::open(['url'=>'dndvlt', 'class'=>'form-horizontal form-validate']) !!}
                            <meta name="csrf-token" content="{{ csrf_token() }}" />
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tên doanh nghiệp <span class="require">*</span> </label>
                                <div class="col-sm-6 controls">
                                    <input id="tendoanhnghiep" type="text" name="tendoanhnghiep" class="form-control required" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Mã số thuế <span class="require">*</span> </label>
                                <div class="col-sm-6 controls">
                                    <input id="masothue" type="text" name="masothue" class="form-control required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Địa chỉ trụ sở chính</label>
                                <div class="col-sm-6 controls">
                                    <input id="diachitruso" type="text" name="diachitruso" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Điện thoại trụ sở chính</label>
                                <div class="col-sm-6 controls">
                                    <input id="telephone" type="text" name="telephone" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Số Fax trụ sở chính</label>
                                <div class="col-sm-6 controls">
                                    <input id="fax" type="text" name="fax" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nơi đăng ký nộp thuế</label>
                                <div class="col-sm-6 controls">
                                    <input id="dknopthue" type="text" name="dknopthue" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Chức danh người ký</label>
                                <div class="col-sm-6 controls">
                                    <input id="chucdanh" type="text" name="chucdanh" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Người ký</label>
                                <div class="col-sm-6 controls">
                                    <input id="nguoiky" type="text" name="nguoiky" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Địa danh</label>
                                <div class="col-sm-6 controls">
                                    <input id="diadanh" type="text" name="diadanh" class="form-control">
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
            $('input[name="masothue"]').blur(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '/dndvlt/checkmasothue/'+$(this).val(),
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
            $('input[name="username"]').blur(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '/dndvlt/checkuser/'+$(this).val(),
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

