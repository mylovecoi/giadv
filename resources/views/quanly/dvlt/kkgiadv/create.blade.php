@extends('main')

@section('custom-style')
    <!-- put the custom style for this page here -->
@stop


@section('custom-script')
    <!-- put the custom script for this page here -->
    <script type="text/javascript" src="{{ url('vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/form-validation.js') }}"></script>
    <script>
        function editItem(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/ajax/editgiaph',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        $('#ttgiaph').replaceWith(data.message);
                        $('#mucgialk').focus();
                    }
                }
            })
        }

        function updategiaph(){
            //alert('vcl');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/ajax/updategiaph',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="idedit"]').val(),
                    mucgialk: $('input[name="mucgialk"]').val(),
                    mucgiakk: $('input[name="mucgiakk"]').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    //$('#modal-wide-width').dialog('close');
                    if(data.status == 'success') {
                        alert('Cập nhật thông tin thành công');
                        $('#ttphong').replaceWith(data.message);
                        $('#modal-wide-width').modal("hide");

                    }
                }
            })
        }

    </script>

@stop

@section('content')
    <div class="page-content">
        <div id="" class="row">
            <div class="col-lg-12">
                <div class="panel panel">
                    <div class="panel-heading">Kê khai giá dịch vụ lưu trú</div>
                    <div class="panel-body pan">
                        {!! Form::open(['url'=>'kkgdvlt/'.$modelcskd->id, 'id' => 'create-kkgdvlt', 'class'=>'horizontal-form form-validate']) !!}
                        <div class="form-body pal">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label for="inputLastName" class="control-label">Ngày kê khai<span class="require">*</span></label>
                                        <div>
                                            <input type="date" name="ngaynhap" id="ngaynhap" class="form-control required" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label for="selGender" class="control-label">Ngày thực hiện mức giá kê khai</label>
                                        <div><input type="date" name="ngayhieuluc" id="ngayhieuluc" class="form-control required"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label for="inputEmail" class="control-label">Số công văn
                                            <span class="require">*</span></label>
                                        <div>
                                            <input type="text" name="socv" id="socv" class="form-control required">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label for="inputEmail" class="control-label">Số công văn liền kề
                                            <span class="require">*</span></label>
                                        <div>
                                            <input type="text" name="socvlk" id="socvlk" class="form-control required">
                                            <!--Bổ xung sau-->
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
                                                <th>Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody id="ttphong">
                                                @foreach($modelph as $ph)
                                                <tr>
                                                    <td>{{$ph->loaip.'-'.$ph->qccl}}</td>
                                                    <td>{{$ph->sohieu}}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <button type="button" data-target="#modal-create" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem({{$ph->id}});"><i class="fa fa-edit"></i>&nbsp;Kê khai giá</button>
                                                    </td>
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
                                        <textarea id="ghichu" class="form-control" name="ghichu" cols="30" rows="3"
                                                  placeholder="-Phụ thu, Thuế VAT"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-actions text-right pal">
                            <div class="col-sm-12" align="center" >
                                <button type="submit" class="btn btn-primary">Hoàn thành</button>
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

    <!--Modal Wide Width-->
    <div id="modal-create" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Kê khai giá phòng</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal" id="ttgiaph">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="updategiaph()" >Đồng ý</button>
                </div>
            </div>
        </div>
    </div>
@stop
