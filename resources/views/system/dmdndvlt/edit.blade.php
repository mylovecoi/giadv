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
                            <b>CHỈNH SỬA THÔNG TIN DOANH NGHIỆP CUNG CẤP DỊCH VỤ LƯU TRÚ</b>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="panel">
                            <div class="panel-body pan">
                            {!! Form::model($model, ['method' => 'PATCH', 'url'=>'dndvlt/'. $model->id, 'class'=>'form-horizontal form-validate']) !!}

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
                                <label class="col-sm-3 control-label">Địa chỉ trụ sở chính<span class="require">*</span> </label>
                                <div class="col-sm-6 controls">
                                    {!!Form::text('diachidn', null, array('id' => 'diachidn','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Điện thoại<span class="require">*</span> </label>
                                <div class="col-sm-6 controls">
                                    {!!Form::text('teldn', null, array('id' => 'teldn','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Số Fax<span class="require">*</span> </label>
                                <div class="col-sm-6 controls">
                                    {!!Form::text('faxdn', null, array('id' => 'fax','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nơi đăng ký nộp thuế<span class="require">*</span> </label>
                                <div class="col-sm-6 controls">
                                    {!!Form::text('noidknopthue', null, array('id' => 'dknopthue','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Chức danh ký<span class="require">*</span> </label>
                                <div class="col-sm-6 controls">
                                    {!!Form::text('chucdanhky', null, array('id' => 'chucdanh','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Họ tên người ký<span class="require">*</span> </label>
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
                </div>
            </div>
        </div>
    </div>
@stop

