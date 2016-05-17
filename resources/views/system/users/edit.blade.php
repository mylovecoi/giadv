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
                            <b>Chỉnh sửa thông tin tài khoản</b>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="panel">
                            <div class="panel-body pan">
                                {!! Form::model($model, ['method' => 'PATCH', 'url'=>'user/'. $model->id, 'class'=>'form-horizontal form-validate']) !!}
                                <meta name="csrf-token" content="{{ csrf_token() }}" />
                                <div class="portlet-body">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Tên tài khoản <span
                                                    class="require">*</span>
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <input id="name" class="form-control required" name="name" type="text" value="{{$model->name}}" autofocus>
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
                                            <input id="user" class="form-control required" name="user" type="text" value="{{$model->username}}">
                                        </div>
                                    </div>
                                    <!--div class="form-group">
                                        <label class="col-sm-4 control-label">Nơi sử dụng
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <select id="level" class="form-control" name="level">
                                                <option value="T" @if($model->level == 'T') selected @endif>Sở tài chính</option>
                                                <option value="H" @if($model->level == 'H') selected @endif>Doanh nghiệp</option>
                                                <option value="X" @if($model->level == 'X') selected @endif>Cơ sở kinh doanh</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Đơn vị trực thuộc
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <select id="mahuyen" class="form-control" name="mahuyen">
                                                <option value="" selected="selected">-- Chọn đơn vị trực thuộc --</option>

                                            </select>
                                        </div>
                                    </div-->
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Trạng thái
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <select id="status" class="form-control" name="status">
                                                <option value="Kích hoạt" @if($model->status == 'Kích hoạt')selected="selected" @endif>Kích hoạt</option>
                                                <option value="Vô hiệu" @if($model->status == 'Vô hiệu')selected="selected" @endif >Vô hiệu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4">&nbsp;</label>
                                        <div class="col-sm-8">
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
@stop

