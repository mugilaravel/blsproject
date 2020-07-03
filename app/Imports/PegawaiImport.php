<?php

namespace App\Imports;

use App\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;

class PegawaiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pegawai([
                'nik'  =>$row[0],
                'nama'  =>$row[1],
                'branch_code'  =>$row[2],
                'branch_name'  =>$row[3],
                'grade_code'  =>$row[4],
                'grade_desc'  =>$row[5],
                'jabatan_code'  =>$row[6],
                'jabatan_desc'  =>$row[7],
                // unutk tanggal perbaiki formatnya
                // 'tgl_lahir'  =>$row[8],
                // 'tgl_pensiun'  =>$row[9],
                'status_peg'  =>$row[10],
                'aktif_pensiun'  =>$row[11],
                'password'  =>$row[12],
                'email'  =>$row[13],
                'is_aktif'  =>$row[14],
                'photo_path'  =>$row[15],
                'handphone_1'  =>$row[16],
                'handphone_2'  =>$row[17],
                // 'createBy'  =>$row[18],
                // 'createDate'  =>$row[19],
                // 'updateBy'  =>$row[20],
                // 'updateDate'  =>$row[21],
                // 'userClient'  =>$row[22],
                // 'versi'  =>$row[23],
        ]);
    }
}
