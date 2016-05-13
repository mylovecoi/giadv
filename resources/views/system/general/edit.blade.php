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
                        <div class="caption">Chỉnh sửa thông tin hệ thống</div>
                    </div>
                    <div class="portlet-body">
                        {!! Form::model($model, ['method' => 'PATCH', 'url'=>'general/'. $model->id, 'class'=>'form-horizontal form-validate']) !!}
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Mã quan hệ ngân sách</label>
                            <div class="col-sm-6 controls">
                                {!!Form::text('maqhns', null, array('id' => 'maqhns','readonly' => 'readonly','class' => 'form-control'))!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tên đơn vị</label>
                            <div class="col-sm-6 controls">
                                {!!Form::text('tendonvi', null, array('id' => 'tendonvi','readonly' => 'readonly','class' => 'form-control'))!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Địa chỉ </label>
                            <div class="col-sm-6 controls">
                                {!!Form::text('diachi', null, array('id' => 'diachi','class' => 'form-control','autofocus'=>'autofocus'))!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Số điện thoại đơn vị</label>
                            <div class="col-sm-6 controls">
                                {!!Form::text('teldv', null, array('id' => 'teldv','class' => 'form-control'))!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Số hồ sơ dịch vụ lưu trú đã nhận</label>
                            <div class="col-sm-6 controls">
                                {!!Form::text('sodvlt', null, array('id' => 'sodvlt','class' => 'form-control','data-mask'=>'fdecimal'))!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Số hồ sơ dịch vụ vận tải đã nhận</label>
                            <div class="col-sm-6 controls">
                                {!!Form::text('sodvvt', null, array('id' => 'sodvvt','class' => 'form-control','data-mask'=>'fdecimal'))!!}
                            </div>
                        </div>
                        <!--div class="form-group">
                            <label class="col-sm-3 control-label">Kế toán<span class="require">*</span></label>
                            <div class="col-sm-6 controls">
                                {!!Form::text('ketoan', null, array('id' => 'ketoan','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Người lập biểu<span class="require">*</span></label>
                            <div class="col-sm-6 controls">
                                {!!Form::text('nguoilapbieu', null, array('id' => 'nguoilapbieu','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Năm quản lý <span class="require">*</span></label>
                            <div class="col-sm-6 controls">
                                <select name="namhethong" id="namhethong" class="form-control">
                                    @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                    @if ($nam_stop = intval(date('Y')) + 5 ) @endif
                                    @for($i = $nam_start; $i <= $nam_stop; $i++)
                                        <option value="{{$i}}" {{$i == $model->namhethong ? 'selected' : ''}}>{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Người lập biểu<span class="require">*</span></label>
                            <div class="col-sm-6 controls">
                                <textarea id="ttlh" class="form-control" name="ttlh" cols="30" rows="10"
                                          placeholder="-Phụ thu, Thuế VAT">{{$model->ttlh}}</textarea>
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
    @include('includes.script.create-header-scripts')
@stop

