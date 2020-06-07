<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParamController extends Controller
{
    public function param()
    {
        $param = \App\Param::orderBy('param_key','DESC')->paginate(10);
        return view('admin.param',['data_param'=> $param]);
    }

    public function paramcreate(Request $request)
    {
        $param = new \App\Param;
        $param->param_key =$request->param_key;
        $param->param_value = $request->param_value;
        $param->param_desc =$request->param_desc;
        $param->param_status =$request->param_status;  
        $param->param_seq =$request->param_seq; 
        $param->save();
        return redirect('admin/param')->with('sukses','Data Berhasil di Simpan');
    }

    public function paramdelete($id)
    {
        $param = \App\Param::find($id);
        $param->delete();
        return redirect('admin/param')->with('sukses','Data Berhasil di Hapus');
    }

    public function paramedit($id)
    {
        $param = \App\Param::find($id);
        return view('admin.paramedit',['data_param'=>$param]);
    }

    public function paramupdate(Request $request,$id)
    {
        $training= \App\Param::find($id);
        $training->update($request->all());
        return redirect('admin/param')->with('sukses','Data Berhasil di Update');
    }

}
