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
                            <b>KÊ KHAI GIÁ DỊCH VỤ VẬN TẢI HÀNH KHÁCH BẰNG XE BUÝT THEO TUYẾN CỐ ĐỊNH</b>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="panel">
                            <div class="panel-body pan">
                                {!! Form::open(['url'=>'dvvantai/dvxb/kekhai', 'id' => 'create-kkdvxb', 'class'=>'form-horizontal form-validate']) !!}
                                <div class="portlet-body">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Ngày nhập
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <input type="date" name="ngaynhap" id="ngaynhap" class="form-control" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Số công văn
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <input type="text" name="socv" id="socv" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Ngày áp dụng
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <input type="date" name="ngayhieuluc" id="ngayhieuluc" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Người nộp
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <input type="text" name="nguoinop" id="nguoinop" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Các yếu tố cấu thành giá
                                        </label>
                                        <div class="col-sm-4 controls">
                                            <textarea id="ghichu" class="form-control" name="ghichu" cols="30" rows="10" placeholder="Các yếu tố chi phí cấu thành giá (đối với kê khai lần đầu); phân tích nguyên nhân, nêu rõ biến động của các yếu tố hình thành giá tác động làm tăng hoặc giảm giá (đối với kê khai lại)."></textarea>
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
