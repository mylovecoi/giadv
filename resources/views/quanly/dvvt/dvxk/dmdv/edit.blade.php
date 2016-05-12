<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 4/16/2016
 * Time: 10:55 PM
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
@stop

@section('content')
    <div class="page-content">
        <div id="" class="row">
            <div class="col-lg-12">
                <div class="portlet box">
                    <div class="portlet-header">
                        <div class="caption">
                            <b>CHỈNH SỬA THÔNG TIN DỊCH VỤ VẬN TẢI</b>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="panel">
                            <div class="panel-body pan">
                                {!! Form::model($model, ['method' => 'PATCH', 'url'=>'dvvantai/dvxekhach/'. $model->id, 'class'=>'form-horizontal form-validate']) !!}
                                <meta name="csrf-token" content="{{ csrf_token() }}" />
                                <div class="portlet-body">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Mã dịch vụ<span
                                                    class="require">*</span>
                                        </label>
                                        <div class="col-sm-4 controls">
                                            {!!Form::text('madichvu', null, array('id' => 'madichvu','class' => 'form-control','autofocus'=>'autofocus'))!!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Tên dịch vụ<span
                                                    class="require">*</span>
                                        </label>
                                        <div class="col-sm-4 controls">
                                            {!!Form::text('tendichvu', null, array('id' => 'tendichvu','class' => 'form-control'))!!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Quy cách chất lượng dịch vụ
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <textarea id="qccl" class="form-control" name="qccl" cols="30" rows="3">{{$model->qccl}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Đơn vị tính
                                        </label>
                                        <div class="col-sm-4 controls">
                                            {!!Form::text('dvt', null, array('id' => 'dvt','class' => 'form-control'))!!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Ghi chú
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <textarea id="ghichu" class="form-control" name="ghichu" cols="30" rows="3">{{$model->ghichu}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!--label class="col-sm-6">&nbsp;</label-->
                                        <div class="col-sm-12" align="center" >
                                            <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
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

