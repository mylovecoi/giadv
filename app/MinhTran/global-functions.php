<?php
function getPermissionDefault($level) {
    $roles = array();

    $roles['T'] = array(
        'dvlt' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 1
        ),
        'dvvt' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 1
        ),
    );
    $roles['H'] = array(
        'dvlt' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'dvvt' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
    );
    $roles['X'] = array(
        'dvlt' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 0
        ),
        'dvvt' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 0
        ),
    );
    $roles['DVLT'] = array(
        'dvlt' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'dvvt' => array(
            'index' => 0,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 0
        ),
    );
    $roles['DVVT'] = array(
        'dvlt' => array(
            'index' => 0,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 0
        ),
        'dvvt' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
    );
    return json_encode($roles[$level]);
}

function getDvCcDefault($level) {
    $roles = array();

    $roles['T'] = array(
        'dvxk' => array(
            'index' => 1
        ),
        'dvxb' => array(
            'index' => 1
        ),
        'dvxtx' => array(
            'index' => 1
        ),
        'dvxch' => array(
            'index' => 1
        ),
    );


    return json_encode($roles[$level]);
}

function getDayVn($date) {
    if($date != null || $date != '')
        $newday = date('d/m/Y',strtotime($date));
    else
        $newday='';
    return $newday;
}
function getDateTime($date) {
    if($date != null)
        $newday = date('d/m/Y H:i:s',strtotime($date));
    else
        $newday='';
    return $newday;
}

function getDbl($obj) {
    $obj=str_replace(',','',$obj);
    $obj=str_replace('.','',$obj);
    if(is_numeric($obj)){
        return $obj;
    }else
        return 0;
}

function can($module = null, $action = null)
{
    $permission = !empty(session('admin')->permission) ? session('admin')->permission : getPermissionDefault(session('admin')->level);
    $permission = json_decode($permission, true);

    //check permission
    if(isset($permission[$module][$action]) && $permission[$module][$action] == 1) {
        return true;
    }else
        return false;

}

function canDvCc($module = null, $action = null)
{
    $permission = !empty(session('ttdnvt')->dvcc) ? session('ttdnvt')->dvcc : getDvCcDefault('T');
    $permission = json_decode($permission, true);

    //check permission
    if(isset($permission[$module][$action]) && $permission[$module][$action] == 1) {
        return true;
    }else
        return false;

}

function getGeneralConfigs() {
    return \App\GeneralConfigs::all()->first()->toArray();
}

function getDouble($str)
{
    $sKQ = 0;
    $str = str_replace(',','',$str);
    $str = str_replace('.','',$str);
    //if (is_double($str))
        $sKQ = $str;
    return floatval($sKQ);
}

function canshow($module = null, $action = null)
{
    $permission = getShowMenu(getGeneralConfigs()['madv']);
    $permission = json_decode($permission, true);

    //check permission
    if(isset($permission[$module][$action]) && $permission[$module][$action] == 1) {
        return true;
    }else
        return false;

}

function chuyenkhongdau($str)
{
    if (!$str) return false;
    $utf8 = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd' => 'đ|Đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i' => 'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );
    foreach ($utf8 as $ascii => $uni) $str = preg_replace("/($uni)/i", $ascii, $str);
     return $str;
}

function chuanhoachuoi($text)
{
    $text = strtolower(chuyenkhongdau($text));
    $text = str_replace("ß", "ss", $text);
    $text = str_replace("%", "", $text);
    $text = preg_replace("/[^_a-zA-Z0-9 -]/", "", $text);
    $text = str_replace(array('%20', ' '), '-', $text);
    $text = str_replace("----", "-", $text);
    $text = str_replace("---", "-", $text);
    $text = str_replace("--", "-", $text);
    return $text;
}

function chuanhoatruong($text)
{
    $text = strtolower(chuyenkhongdau($text));
    $text = str_replace("ß", "ss", $text);
    $text = str_replace("%", "", $text);
    $text = preg_replace("/[^_a-zA-Z0-9 -]/", "", $text);
    $text = str_replace(array('%20', ' '), '_', $text);
    $text = str_replace("----", "_", $text);
    $text = str_replace("---", "_", $text);
    $text = str_replace("--", "_", $text);
    return $text;
}

function getAddMap($diachi){
    $str = chuyenkhongdau($diachi);
    $str = str_replace(' ','+',$str);
    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$str.'&sensor=false');
    $output = json_decode($geocode);
    if($output->status == 'OK'){
        $kq = $output->results[0]->geometry->location->lat. ',' .$output->results[0]->geometry->location->lng;
    }else{
        $kq = '';
    }
    return $kq;
}
?>