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
                <div class="panel panel">
                    <div class="panel-heading">Chỉnh sửa kê khai giá dịch vụ lưu trú</div>
                    <div class="panel-body pan">
                        {!! Form::model($model,['method' => 'PATCH','url'=>'xetduyetkkgdvlt/'.$model->id, 'class'=>'horizontal-form form-validate']) !!}
                        <div class="form-body pal">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label for="inputLastName" class="control-label">Cơ sở kinh doanh</label>
                                        <div>
                                            <input type="text" name="ngaynhap" id="ngaynhap" class="form-control" readonly value="{{$modelcskd->tencskd}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label for="selGender" class="control-label">Loại hạng</label>
                                        <div><input type="text" name="ngayhieuluc" id="ngayhieuluc" class="form-control" readonly value="{{$modelcskd->loaihang}}"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label for="inputLastName" class="control-label">Số điện thoại CSKD</label>
                                        <div>
                                            <input type="text" name="ngaynhap" id="ngaynhap" class="form-control" readonly value="{{$modelcskd->telkd}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label for="selGender" class="control-label">Địa chỉ CSKD</label>
                                        <div><input type="text" name="ngayhieuluc" id="ngayhieuluc" class="form-control" readonly value="{{$modelcskd->diachikd}}"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label for="inputLastName" class="control-label">Ngày kê khai</label>
                                        <div>
                                            <input type="date" name="ngaynhap" id="ngaynhap" class="form-control" readonly value="{{$model->ngaynhap}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label for="selGender" class="control-label">Ngày thực hiện mức giá kê khai</label>
                                        <div><input type="date" name="ngayhieuluc" id="ngayhieuluc" class="form-control" readonly value="{{$model->ngayhieuluc}}"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label for="inputEmail" class="control-label">Số công văn</label>
                                        <div>
                                            <input type="text" name="socv" id="socv" class="form-control" readonly value="{{$model->socv}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label for="inputEmail" class="control-label">Ngày giờ chuyển</label>
                                        <div>
                                            <input type="text" name="socv" id="socv" class="form-control" readonly value="{{getDateTime($model->ngaychuyen)}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label for="inputEmail" class="control-label">Số công văn liền kề</label>
                                        <div>
                                            <input type="text" name="socvlk" id="socvlk" class="form-control" readonly value="{{$model->socvlk}}">
                                            <!--Bổ xung sau-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label for="inputEmail" class="control-label">Ngày nhập số công văn liền kề</label>
                                        <div>
                                            <div><input type="date" name="ngaycvlk" id="ngaycvlk" class="form-control" readonly value="{{$model->ngaycvlk}}"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="macskd" id="macskd" value="{{$modelcskd->macskd}}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="tabletrocap" class="table table-hover table-striped table-bordered table-advanced tablesorter">
                                            <thead>
                                            <tr>
                                                <th>Loại phòng<br>Quy cách chất lượng</th>
                                                <th>Số hiệu phòng</th>
                                                <th>Mức giá liền kề</th>
                                                <th>Mức giá kê khai</th>
                                            </tr>
                                            </thead>
                                            <tbody id="ttphong">
                                                @foreach($modelgiaph as $ph)
                                                <tr>
                                                    <td>{{$ph->loaip.'-'.$ph->qccl}}</td>
                                                    <td>{{$ph->sohieu}}</td>
                                                    <td>{{number_format($ph->mucgialk)}}</td>
                                                    <td>{{number_format($ph->mucgiakk)}}</td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label for="selGender" class="control-label">Thông tin kê khai</label>
                                        <div>
                                        <textarea id="giayphepkddn" class="form-control" name="giayphepkddn" cols="30" rows="3"
                                                  placeholder="-Phụ thu, Thuế VAT" readonly>{{$model->ghichu}}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--div class="row">
                            <div class="col-md-6">
                                <div class="form-group"><label for="inputEmail" class="control-label">Ngày chuyển</label>
                                    <div>
                                        <input type="datetime" name="socv" id="socv" class="form-control required" value="{{$model->ngaychuyen}}">
                                    </div>
                                </div>
                            </div>
                        </div-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"><label for="inputEmail" class="control-label">Số hồ sơ nhận</label>
                                    <div>
                                        <input type="text" name="sohsnhan" id="sohsnhan" class="form-control" data-mask="fdecimal" value="{{$model->sohsnhan}}" autofocus>
                                        <!--Bổ xung sau-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><label for="inputEmail" class="control-label">Ngày nhận hồ sơ</label>
                                    <div>
                                        <input type="date" name="ngaynhan" id="ngaynhan" class="form-control" value="{{$model->ngaynhan}}">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="tt" id="tt" value="{{$tt}}">
                        </div>
                        <div class="form-actions text-right pal">
                            <div class="col-sm-12" align="center" >
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                &nbsp;
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
