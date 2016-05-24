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
                        <div class="caption">Thay đổi thông tin doanh nghiệp</div>
                    </div>
                    <div class="portlet-body">
                        {!! Form::model($model, ['method' => 'PATCH', 'url'=>'dvvantai/ttdv/update/'. $model->id, 'class'=>'form-horizontal form-validate']) !!}
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tên doanh nghiệp</label>
                            <div class="col-sm-6 controls">
                                {!!Form::text('tendonvi', null, array('id' => 'tendonvi','readonly' => 'readonly','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Mã số thuê</label>
                            <div class="col-sm-6 controls">
                                {!!Form::text('masothue', null, array('id' => 'masothue','readonly' => 'readonly','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Địa chỉ trụ sở<span class="require">*</span></label>
                            <div class="col-sm-6 controls">
                                {!!Form::text('diachi', null, array('id' => 'diachi','class' => 'form-control required','autofocus'=>'autofocus'))!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Số điện thoại trụ sở<span class="require">*</span></label>
                            <div class="col-sm-6 controls">
                                {!!Form::text('dienthoai', null, array('id' => 'dienthoai','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Số Fax trụ sở<span class="require">*</span></label>
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
                            <label class="col-sm-3 control-label">Họ và tên người ký<span class="require">*</span> </label>
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
                            <div class="col-sm 12" align="center">
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
        </div>
    </div>
@stop

