<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table ='training';
    protected $fillable = [
        'kode', 'nama', 'program','skill','tgl_mulai','tgl_akhir'
    ];
}
