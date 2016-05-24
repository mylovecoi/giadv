@extends('main')

@section('custom-style')

@stop


@section('custom-script')

@stop

@section('content')
    <div class="page-content">
        <div id="" class="row">
            <div class="col-lg-12">
                {!! Form::open(['url' => '/user/permission'])!!}
                    <div class="portlet box">
                        <div class="portlet-header">
                            <div class="caption">
                                {{$model->name .' ( Username: '. $model->username. ')' }}
                            </div>

                            <div class="actions">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="row" style="display: block">
                                    <div class="col-md-3">
                                        <h4>Dịch vụ lưu trú</h4>
                                        <table class="table table-hover table-striped table-bordered table-advanced tablesorter">
                                            <thead class="primary">
                                            <tr>
                                                <th width = "5%"><input type="checkbox" class="checkall"/></th>
                                                <th>Chức năng</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->dvlt->index) && $permission->dvlt->index == 1) ? 'checked' : '' }} value="1" name="roles[dvlt][index]"/></td>
                                                <td>Xem</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->dvlt->create) && $permission->dvlt->create == 1) ? 'checked' : '' }} value="1" name="roles[dvlt][create]"/></td>
                                                <td>Thêm mới</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->dvlt->create) && $permission->dvlt->create == 1) ? 'checked' : '' }} value="1" name="roles[dvlt][edit]"/></td>
                                                <td>Chỉnh sửa</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->dvlt->delete) && $permission->dvlt->delete == 1) ? 'checked' : '' }} value="1" name="roles[dvlt][delete]"/></td>
                                                <td>Xóa</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->dvlt->approve) && $permission->dvlt->approve == 1) ? 'checked' : '' }} value="1" name="roles[dvlt][approve]"/></td>
                                                @if($model->level == 'T')
                                                    <td>Duyệt</td>
                                                @else
                                                    <td>Chuyển</td>
                                                @endif
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-3">
                                        <h4>Cước vận tải</h4>
                                        <table class="table table-hover table-striped table-bordered table-advanced tablesorter">
                                            <thead class="primary">
                                            <tr>
                                                <th width = "5%"><input type="checkbox" class="checkall"/></th>
                                                <th>Chức năng</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->dvvt->index) && $permission->dvvt->index == 1) ? 'checked' : '' }} value="1" name="roles[dvvt][index]"/></td>
                                                <td>Xem</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->dvvt->create) && $permission->dvvt->create == 1) ? 'checked' : '' }} value="1" name="roles[dvvt][create]"/></td>
                                                <td>Thêm mới</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->dvvt->create) && $permission->dvvt->create == 1) ? 'checked' : '' }} value="1" name="roles[dvvt][edit]"/></td>
                                                <td>Chỉnh sửa</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->dvvt->delete) && $permission->dvvt->delete == 1) ? 'checked' : '' }} value="1" name="roles[dvvt][delete]"/></td>
                                                <td>Xóa</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->dvvt->approve) && $permission->dvvt->approve == 1) ? 'checked' : '' }} value="1" name="roles[dvvt][approve]"/></td>
                                                @if($model->level == 'T')
                                                    <td>Duyệt</td>
                                                @else
                                                    <td>Chuyển</td>
                                                @endif
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::hidden('id', $model->id)!!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop