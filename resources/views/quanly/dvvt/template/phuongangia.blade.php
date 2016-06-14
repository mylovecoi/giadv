<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14/06/2016
 * Time: 8:28 AM
 */
?>

<!--Modal phương án giá-->
<div id="modal-pagia-create" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Kê khai phương án giá</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal" id="pagia">
                    <div class="form-group">
                        <label class="col-md-6 control-label">Sản lượng tính giá</label>
                        <div class="col-md-6">
                            <input type="text" id="sanluong" name="sanluong" class="form-control" data-mask="fdecimal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6 control-label">Chi phí nguyên liệu trực tiếp</label>
                        <div class="col-md-6">
                            <input type="text" id="sanluong" name="sanluong" class="form-control" data-mask="fdecimal">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-6 control-label">Chi phí nhân công trực tiếp</label>
                        <div class="col-md-6">
                            <input type="text" id="sanluong" name="sanluong" class="form-control" data-mask="fdecimal">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-6 control-label">Chi phí khấu hao máy móc trực tiếp</label>
                        <div class="col-md-6">
                            <input type="text" id="sanluong" name="sanluong" class="form-control" data-mask="fdecimal">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-6 control-label">Chi phí sản xuất, kinh doanh theo đặc thù</label>
                        <div class="col-md-6">
                            <input type="text" id="sanluong" name="sanluong" class="form-control" data-mask="fdecimal">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-6 control-label">Chi phí sản xuất chung</label>
                        <div class="col-md-6">
                            <input type="text" id="sanluong" name="sanluong" class="form-control" data-mask="fdecimal">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-6 control-label">Chi phí tài chính</label>
                        <div class="col-md-6">
                            <input type="text" id="sanluong" name="sanluong" class="form-control" data-mask="fdecimal">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-6 control-label">Chi phí bán hàng</label>
                        <div class="col-md-6">
                            <input type="text" id="sanluong" name="sanluong" class="form-control" data-mask="fdecimal">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-6 control-label">Chi phí quản lý</label>
                        <div class="col-md-6">
                            <input type="text" id="sanluong" name="sanluong" class="form-control" data-mask="fdecimal">
                        </div>
                    </div>
                    <input type="hidden" id="idpag" name="idpag"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="update_pagia()">Đồng ý</button>
            </div>
        </div>
    </div>
</div>