<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'user_id'  =>$row[0],
            'name'     => $row[1],
            'email'    => $row[2],
            'role'      =>$row[5], 
            'password' => \Hash::make('123456'),
        ]);
    }
}
