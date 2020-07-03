<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table ='pegawai';
    protected $fillable = [
                'nik',
                'nama',
                'branch_code',
                'branch_name',
                'grade_code',
                'grade_desc',
                'jabatan_code',
                'jabatan_desc',
                'tgl_lahir',
                'tgl_pensiun',
                'status_peg',
                'aktif_pensiun',
                'password',
                'email',
                'is_aktif',
                'photo_path',
                'handphone_1',
                'handphone_2',
                'createBy',
                'createDate',
                'updateBy',
                'updateDate',
                'userClient',
                'versi',
    ];
    //
}
