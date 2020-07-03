<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function map($user): array
    {
        return [

            $user ->user_id,
            $user ->name,
            $user ->email,
            $user ->divisi->nama,
            $user ->departemen->nama
            // 'name', 'email', 'password','role','user_id','phone1','departemen_kode','divisi_kode','grade','picture'
        ];
    }

    public function headings(): array
    {
        return [
            'User Id',
            'Nama',
            'Email',
            'Divisi',
            'Departemen',
        ];
    }
}
