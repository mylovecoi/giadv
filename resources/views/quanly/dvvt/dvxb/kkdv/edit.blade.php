<?php
/**
 * Created by PhpStorm.
 * User: MyloveCoi
 * Date: 22/04/2016
 * Time: 3:00 PM
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
    <script type="text/javascript" src="{{url('js/jquery.inputmask.bundle.min.js')}}"></script>
    <script>
        function Changeeditor() {
            var text = $("#ghichu").val();
            text = text.replace(/\r?\n/g, '<br />');
        }
    </script>

@stop

@section('content')
    <div class="page-content">
        <div id="" class="row">
            <div class="col-lg-12">
                <div class="portlet box">
                    <div class="portlet-header">
                        <div class="caption">
                            <b>CẬP NHẬT KÊ KHAI GIÁ DỊCH VỤ VẬN TẢI HÀNH KHÁCH BẰNG XE BUÝT THEO TUYẾN CỐ ĐỊNH</b>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="panel">
                            <div class="panel-body pan">
                                {!! Form::model($model, ['method' => 'PATCH', 'url'=>'dvvantai/dvxb/kekhai/'. $model->id, 'class'=>'form-horizontal form-validate']) !!}

                                <div class="portlet-body">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Ngày nhập
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <input type="date" name="ngaynhap" id="ngaynhap" class="form-control"  value="{{$model->ngaynhap}}" autofocus @if(session('admin')->level == 'T') readonly @endif>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Số công văn
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <input type="text" name="socv" id="socv" class="form-control" value="{{$model->socv}}" {{(session('admin')->level == 'T') ? 'readonly' : ''}}>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Ngày áp dụng
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <input type="date" name="ngayhieuluc" id="ngayhieuluc" class="form-control" value="{{$model->ngayhieuluc}}" {{(session('admin')->level == 'T') ? 'readonly' : ''}}>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Người nộp
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <input type="text" name="nguoinop" id="nguoinop" class="form-control" value="{{$model->nguoinop}}" {{(session('admin')->level == 'T') ? 'readonly' : ''}}>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Ghi chú
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <textarea id="ghichu" data-provide="markdown" class="form-control md-input" name="ghichu" cols="30" rows="10" onchange="Changeeditor()" {{(session('admin')->level == 'T') ? 'readonly' : ''}}>{{$model->ghichu}}</textarea>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Ngày nhận hồ sơ
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <input type="date" name="ngaynhan" id="ngaynhan" class="form-control" value="{{$model->ngaynhan}}" {{(session('admin')->level == 'H') ? 'readonly' : ''}}>
                                        </div>
                                    </div>
                                    <div class="form-group">
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
    @include('includes.script.create-header-scripts')

@stop

