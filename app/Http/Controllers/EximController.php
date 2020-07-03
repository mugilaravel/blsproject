<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// untuk export
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\PegawaiImport;
class EximController extends Controller
{

    public function exim()
    {
        // $param = \App\Param::orderBy('param_key','DESC')->paginate(10);
        // return view('admin.param',['data_param'=> $param]);
        return view('admin.exim');
    }


    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function importx() 
    {     
        // return Excel::download(new UsersExport, 'users.xlsx');
        Excel::import(new UsersImport,request()->file('file'));
        // dd(request()->file('file'));
    }

    public function import() 
    {     
        // return Excel::download(new UsersExport, 'users.xlsx');
        Excel::import(new PegawaiImport,request()->file('file'));
        // dd(request()->file('file'));
    }
}
