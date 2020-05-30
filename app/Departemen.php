<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table ='departemen';
    protected $fillable = [
        'kode', 'nama','nik_kadept','nama_kadept','divisi_kode'
    ];

    public function divisi()
    {
        return $this->belongsTo('App\Divisi','divisi_kode','kode');
        // FK-->divisi_kode pada table departement, ID --> dari divisi
    }

    public function user()//masternya
    {
        return $this->hasMany('App\User','depatemen_kode','kode');
        // FK-->divisi_kode pada table departement, ID --> dari divisi
    }
    
}
