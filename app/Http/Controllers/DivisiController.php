<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function divisi()
    {
        $divisi = \App\Divisi::paginate(10);;
        return view('admin.divisi',['data_divisi'=> $divisi]);
    }

    public function divisicreate(Request $request)
    {
        $divisi = new \App\Divisi;
        $divisi->kode =$request->kode;
        $divisi->nama = $request->nama;
        $divisi->nik_kadiv =$request->nik_kadiv;
        $divisi->nama_kadiv =$request->nama_kadiv;  
        $divisi->save();
        return redirect('admin/divisi')->with('sukses','Data Berhasil di Simpan');
    }

    public function divisidelete($id)
    {
        $divisi = \App\Divisi::find($id);
        $divisi->delete();
        return redirect('admin/divisi')->with('sukses','Data Berhasil di Hapus');
    }

    public function divisiedit($id)
    {
        $divisi = \App\Divisi::find($id);
        return view('admin.divisiedit',['data_divisi'=>$divisi]);
    }

    public function divisiupdate(Request $request,$id)
    {
        $training= \App\Divisi::find($id);
        $training->update($request->all());
        return redirect('admin/divisi')->with('sukses','Data Berhasil di Update');
    }



}
