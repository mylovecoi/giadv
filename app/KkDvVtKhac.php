<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KkDvVtKhac extends Model
{
    protected $table = 'kkdvvtkhac';
    protected $fillabel = [
        'id',
        'masothue',
        'ngaynhap',
        'socv',
        'ngayhieuluc',
        'nguoinop',
        'ngaynhan',
        'trangthai',
        'ghichu'
    ];
}
