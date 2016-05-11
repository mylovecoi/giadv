<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DnDvLt extends Model
{
    protected $table = 'dndvlt';
    protected $fillable = [
        'id',
        'tendn',
        'masothue',
        'diachidn',
        'teldn',
        'faxdn',
        'noidknopthue',
        'chucdanhky',
        'nguoiky',
        'diadanh'
    ];
}
