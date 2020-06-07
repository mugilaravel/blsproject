<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Param extends Model
{
    protected $table ='param';
    protected $fillable = [
        'param_key', 'param_value','param_desc','param_status','param_seq'
    ];
}
