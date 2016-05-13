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
        'tendichvu',
        'qccl',
        'dvt',
        'giakk',
        'giakklk',
        'ghichu',
        'thuevat'
    ];
}
