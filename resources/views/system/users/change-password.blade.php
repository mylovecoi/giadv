@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('vendors/jquery-validate/jquery.validate.min.js')}}"></script>
@stop

@section('content')
    <div class="page-content">
        <div id="" class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-6">
                <h3 class="text-center"><b>Thay đổi mật khẩu</b></h3><br>
                {!! Form::open(['url'=>'/user/cpw', 'id' => 'form-changepass', 'class'=>'form-horizontal form-validate']) !!}
                    <div class="form-group">
                        <label for="current-password" class="col-sm-4 control-label">Mật khẩu cũ <span class="require">*</span></label>
                        <div class="col-sm-8">
                            {!!Form::password('current-password', array('id' => 'current-password','class' => 'form-control required'))!!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="newpassword" class="col-sm-4 control-label">Mật khẩu mới <span class="require">*</span></label>
                        <div class="col-sm-8">
                            {!!Form::password('newpassword', array('id' => 'newpassword','class' => 'form-control required'))!!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="newpassword2" class="col-sm-4 control-label">Nhập lại mật khẩu mới <span class="require">*</span></label>
                        <div class="col-sm-8">
                            {!!Form::password('newpassword2', array('id' => 'newpassword2','class' => 'form-control required'))!!}
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" onclick="validatePassword();" class="btn btn-primary">Cập nhật</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function validatePassword(){

            var validator = $("#form-changepass").validate({
                rules: {
                    newpassword :"required",
                    newpassword2:{
                        equalTo: "#newpassword"
                    }
                },
                messages: {
                    newpassword :" Nhập mật khẩu mới",
                    newpassword2 :" Nhập lại mật khẩu mới không chính xác"
                }
            });
        }
    </script>
@stop 