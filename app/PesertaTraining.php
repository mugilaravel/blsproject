<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesertaTraining extends Model
{
    protected $table ='pesertatraining';
    protected $fillable = [
        'user_id', 'kode', 'kantor_kode','nilai','atasan','bawahan','sejawat'
    ];
}
