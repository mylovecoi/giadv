<?php
/**
 * Created by PhpStorm.
 * User: MyloveCoi
 * Date: 18/04/2016
 * Time: 2:52 PM
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

@stop

@section('content')
    <div class="page-content">
        <div id="" class="row">
            <div class="col-lg-12">
                <div class="portlet box">
                    <div class="portlet-header">
                        <div class="caption">
                            <b>CHỈNH SỬA GIÁ DỊCH VỤ VẬN TẢI KHÁC</b>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="panel">
                            <div class="panel-body pan">
                                {!! Form::model($model, ['method' => 'PATCH', 'url'=>'dvvantai/dvkhac/chitiet/update/'.$id, 'class'=>'form-horizontal form-validate']) !!}

                                <div class="portlet-body">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Tên dịch vụ
                                        </label>
                                        <div class="col-sm-4 controls">
                                            {!!Form::text('tendichvu', null, array('id' => 'tendichvu','class' => 'form-control'))!!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Quy cách chất lượng
                                        </label>
                                        <div class="col-sm-4 controls">
                                            {!!Form::text('qccl', null, array('id' => 'qccl','class' => 'form-control'))!!}
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
                                        <label class="col-sm-4 control-label">Mức giá kê khai trước liền kề
                                        </label>
                                        <div class="col-sm-4 controls">
                                            {!!Form::text('giakklk', null, array('id' => 'giakklk','class' => 'form-control','autofocus'=>'autofocus','data-mask'=>'fdecimal'))!!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Mức giá kê khai
                                        </label>
                                        <div class="col-sm-4 controls">
                                            {!!Form::text('giakk', null, array('id' => 'giakk','class' => 'form-control','autofocus'=>'autofocus','data-mask'=>'fdecimal'))!!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Thuế VAT
                                        </label>
                                        <div class="col-sm-4 controls">
                                            {!!Form::text('thuevat', null, array('id' => 'thuevat','class' => 'form-control','autofocus'=>'autofocus'))!!}
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

