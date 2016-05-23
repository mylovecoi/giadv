<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmDvVtKhac extends Model
{
    protected $table = 'dmdvvtkhac';
    protected $fillable = [
        'id',
        'masothue',
        'madichvu',
        'loaixe',
        'tendichvu',
        'qccl',
        'dvt',
        'ghichu'
    ];
}
