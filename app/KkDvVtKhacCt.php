<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KkDvVtKhacCt extends Model
{
    protected $table = 'kkdvvtkhacct';
    protected $fillable = [
        'id',
        'masokk',
        'madichvu',
        'loaixe',
        'tendichvu',
        'qccl',
        'dvt',
        'giakk',
        'giakklk',
        'ghichu',
        'thuevat'
    ];
}
