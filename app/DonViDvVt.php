<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonViDvVt extends Model
{
    protected $table = 'donvidvvt';
    protected $filltable = [
        'id',
        'tendonvi',
        'masothue',
        'diachi',
        'dienthoai',
        'giayphepkd',
        'fax',
        'diadanh',
        'chucdanh',
        'nguoiky',
        'dknopthue',
        'dvxk',
        'dvxb',
        'dvxtx',
        'dvk',
        'toado',
        'ghichu'
    ];
}
