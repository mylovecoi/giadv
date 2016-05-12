<?php
/**
 * Created by PhpStorm.
 * User: MyloveCoi
 * Date: 22/04/2016
 * Time: 3:02 PM
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
                            <b>NHẬP GIÁ DỊCH VỤ VẬN TẢI HÀNH KHÁCH BẰNG XE BUÝT</b>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="panel">
                            <div class="panel-body pan">
                                {!! Form::open(['url'=>'dvvantai/dvxb/chitiet/store', 'id' => 'create-ctkkgdvlt', 'class'=>'form-horizontal form-validate', 'method'=>'post']) !!}

                                <div class="portlet-body">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Tên dịch vụ</label>
                                        <div class="col-sm-4 controls">
                                            {{$modeldichvu->tendichvu}}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Quy cách chất lượng</label>
                                        <div class="col-sm-4 controls">
                                            {{$modeldichvu->qccl}}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Mức giá vé lượt kê khai trước liền kề</label>
                                        <div class="col-sm-4 controls">
                                            <input type="text" id="giakklkluot" name="giakklkluot" class="form-control" data-mask="fdecimal" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Mức giá vé lượt kê khai
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <input type="text" id="giakkluot" name="giakkluot" class="form-control" data-mask="fdecimal" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Mức giá vé tháng kê khai trước liền kề</label>
                                        <div class="col-sm-4 controls">
                                            <input type="text" id="giakklkthang" name="giakklkthang" class="form-control" data-mask="fdecimal" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Mức giá tháng lượt kê khai
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <input type="text" id="giakkthang" name="giakkthang" class="form-control" data-mask="fdecimal" autofocus>
                                        </div>
                                    </div>

                                    <input type="hidden" name="idkk" id="idkk" value="{{$idkk}}">
                                    <input type="hidden" name="madichvu" id="madichvu" value="{{$modeldichvu->madichvu}}">
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

