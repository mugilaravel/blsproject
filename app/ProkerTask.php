<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProkerTask extends Model
{
    protected $table ='prokertask';
    protected $fillable = [
        'kode', 'proker_kode', 'descripsi','nama','jenis','pic_nik','review_nik',
        'review_desc','status','mulai','selesai','doc_path','bobot','create_by','update_by'
    ];

    public function proker()
    
    {
        return $this->belongsTo('App\Proker','proker_kode','kode');
        // FK-->divisi_kode pada table departement, ID --> dari divisi
    }

    // public function divisi()
    // {
    //     return $this->belongsTo('App\Divisi','divisi_kode','kode');
    //     // FK-->divisi_kode pada table departement, ID --> dari divisi
    // }

    // public function departemen()//childnya
    // {
    //     return $this->belongsTo('App\Departemen','departemen_kode','kode');
    //     // FK-->divisi_kode pada table departement, ID --> dari divisi
    // }
}
