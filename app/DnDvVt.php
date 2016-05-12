<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DnDvVt extends Model
{
    protected $table = 'dndvvt';
    protected $fillable = [
        'id',
        'masothue',
        'tendn',
        'diachidn',
        'dienthoaidn',
        'giayphepkddn',
        'faxdn',
        'diadanh',
        'chucdanhky',
        'nguoiky',
        'noidknopthuedn',
        'ghichu'
    ];
}
