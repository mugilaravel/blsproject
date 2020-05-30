<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    protected $table ='proker';
    // protected $fillable = [
    //     'kode', 'nama', 'program','skill','tgl_mulai','tgl_akhir'
    // ];

    public function divisi()
    {
        return $this->belongsTo('App\Divisi','divisi_kode','kode');
        // FK-->divisi_kode pada table departement, ID --> dari divisi
    }

    public function departemen()//childnya
    {
        return $this->belongsTo('App\Departemen','departemen_kode','kode');
        // FK-->divisi_kode pada table departement, ID --> dari divisi
    }
}
