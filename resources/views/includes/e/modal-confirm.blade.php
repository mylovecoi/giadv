
<script>
    function userlock(){
        $('#frmLockUser').submit();
    }
    function userunlock(){
        $('#frmUnLockUser').submit();
    }
    function theodoi(){
        $('#frmTheoDoi').submit();
    }
    function botheodoi(){
        $('#frmBoTheoDoi').submit();
    }
    function clickChuyen(){
        $('#frmChuyen').submit();
    }
    function clickDuyet(){
        $('#frmDuyet').submit();
    }
    function clickBoDuyet(){
        $('#frmBoDuyet').submit();
    }
    function clickTraLai(){
        $('#frmTraLai').submit();
    }
</script>


<!--Modal Delete-->
<div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <form id="frmDelete" method="GET" action="#" accept-charset="UTF-8">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý xoá?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary">Đồng ý</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!--Modal Lockuser-->

<div id="lockuser-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <form id="frmLockUser" method="GET" action="#" accept-charset="UTF-8">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý khóa?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="userlock()">Đồng ý</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!--Modal UnLockuser-->

<div id="unlockuser-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <form id="frmUnLockUser" method="GET" action="#" accept-charset="UTF-8">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý mở khóa?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="userunlock()">Đồng ý</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!--Modal NotID-->

<div id="notid-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <form id="frmNotId" method="GET" action="#" accept-charset="UTF-8">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Bạn chưa chọn thông tin nào!</h4>
                </div>
                <div class="modal-footer">
                    <button type="submit" data-dismiss="modal" class="btn btn-primary">Ok</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!--Modal Theo Dõi-->

<div id="theodoi-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <form id="frmTheoDoi" method="GET" action="#" accept-charset="UTF-8">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý theo dõi các mặt hàng này?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="theodoi()">Đồng ý</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!--Modal Theo Dõi-->

<div id="botheodoi-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <form id="frmBoTheoDoi" method="GET" action="#" accept-charset="UTF-8">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý bỏ theo dõi các mặt hàng này?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="botheodoi()">Đồng ý</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!--Modal Chuyển-->
<div id="chuyen-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <form id="frmChuyen" method="GET" action="#" accept-charset="UTF-8">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý chuyển kê khai giá dịch vụ lưu trú lên Sở Tài Chính?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickChuyen()">Đồng ý</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!--Modal Duyệt-->
<div id="duyet-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <form id="frmDuyet" method="GET" action="#" accept-charset="UTF-8">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý duyệt bảng kê khai giá dịch vụ lưu trú?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickDuyet()">Đồng ý</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!--Modal Bỏ Duyệt-->
<div id="boduyet-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <form id="frmBoDuyet" method="GET" action="#" accept-charset="UTF-8">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý bỏ duyệt bảng kê khai giá dịch vụ lưu trú?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickBoDuyet()">Đồng ý</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!--Modal Bỏ Duyệt-->
<div id="tralai-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <form id="frmTraLai" method="GET" action="#" accept-charset="UTF-8">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý chuyển trả lại bảng kê khai giá dịch vụ lưu trú?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickTraLai()">Đồng ý</button>
                </div>
            </div>
        </div>
    </form>
</div>