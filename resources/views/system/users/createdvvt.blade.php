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
                            <b>THÊM MỚI TÀI KHOẢN</b>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="panel">
                            <div class="panel-body pan">
                                {!! Form::open(['url'=>'user/store-dvvt', 'id' => 'create-user', 'class'=>'form-horizontal form-validate']) !!}
                                <meta name="csrf-token" content="{{ csrf_token() }}" />
                                <div class="portlet-body">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Cấp sử dụng <span
                                                    class="require">*</span>
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <input id="name" class="form-control required" name="name" type="text" value="Doanh nghiệp cung cấp dịch vụ vận tải" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Tên doanh nghiệp
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <select id="mahuyen" class="form-control" name="mahuyen" autofocus>
                                                <option value="" selected="selected">-- Chọn doanh nghiệp --</option>
                                                @foreach($modeldn as $dn)
                                                    <option value="{{$dn->masothue}}">{{$dn->tendonvi}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Tên tài khoản <span
                                                    class="require">*</span>
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <input id="name" class="form-control required" name="name" type="text" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Phone
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <input id="phone" class="form-control" name="phone" type="text" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Email
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <input id="email" class="form-control" name="email" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Tài khoản truy cập<span
                                                    class="require">*</span></label>
                                        <div class="col-sm-4 controls">
                                            <input id="user" class="form-control required" name="user" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Mật khẩu<span
                                                    class="require">*</span></label>
                                        <div class="col-sm-4 controls">
                                            <input id="password" class="form-control required" name="password" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Trạng thái
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <select id="status" class="form-control" name="status">
                                                <option value="Kích hoạt" selected="selected">Kích hoạt</option>
                                                <option value="Vô hiệu">Vô hiệu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!--label class="col-sm-6">&nbsp;</label-->
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
            $('input[name="user"]').change(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '/user/checkuser/'+$(this).val(),
                    data: {
                        _token: CSRF_TOKEN,
                    },
                    success: function (respond) {
                        if(respond != 'ok'){
                            alert('Username đã tồn tại!');
                            $('input[name="user"]').removeClass('valid').addClass('invalid')
                                    .parent().removeClass('state-success').addClass('state-error');
                        }else {
                            $('input[name="user"]').removeClass('invalid').addClass('valid')
                                    .parent().removeClass('state-error').addClass('state-success');
                        }
                    }

                });
            })
        }(jQuery));
    </script>


@stop

