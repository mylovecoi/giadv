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
                        {!! Form::model($model, ['method' => 'PATCH', 'url'=>'ttdndvlt/'. $model->id, 'class'=>'form-horizontal form-validate']) !!}
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tên doanh nghiệp</label>
                            <div class="col-sm-6 controls">
                                {!!Form::text('tendn', null, array('id' => 'tendn','readonly' => 'readonly','class' => 'form-control required'))!!}
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
                                {!!Form::text('diachidn', null, array('id' => 'diachidn','class' => 'form-control required','autofocus'=>'autofocus'))!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Số điện thoại trụ sở<span class="require">*</span></label>
                            <div class="col-sm-6 controls">
                                {!!Form::text('teldn', null, array('id' => 'teldn','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Số Fax trụ sở<span class="require">*</span></label>
                            <div class="col-sm-6 controls">
                                {!!Form::text('faxdn', null, array('id' => 'faxdn','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nơi đăng ký nộp thuế<span class="require">*</span> </label>
                            <div class="col-sm-6 controls">
                                {!!Form::text('noidknopthue', null, array('id' => 'noidknopthue','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Chức danh<span class="require">*</span> </label>
                            <div class="col-sm-6 controls">
                                {!!Form::text('chucdanhky', null, array('id' => 'chucdanhky','class' => 'form-control required'))!!}
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

