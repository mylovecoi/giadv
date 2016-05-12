<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KkDvVtKhacCt extends Model
{
    protected $table = 'kkdvvtkhacct';
    protected $fillable = [
        'id',
        'idkk',
        'madichvu',
        'giakk',
        'giakklk',
        'ghichu'
    ];
}
