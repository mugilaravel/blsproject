<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProkerController extends Controller
{
    public function proker()
    {
        $proker = \App\Proker::paginate(10);
        $divisi = \App\Divisi::all();
        $departemen = \App\Departemen::all();
        return view('job.proker',['data_proker'=> $proker,'data_divisi'=>$divisi,'data_departemen'=>$departemen]);
    }

    public function prokercreate(Request $request)
    {
        $proker = new \App\Proker;
        $proker->kode =$request->kode;
        $proker->nama = $request->nama;
        $proker->descripsi =$request->descripsi;
        $proker->jenis =$request->jenis;
        $proker->departemen_kode =$request->departemen_kode;
        $proker->divisi_kode =$request->divisi_kode;
        $proker->pic_nik =$request->pic_nik;
        $proker->status =$request->status;
        $proker->mulai =$request->mulai;
        $proker->selesai =$request->selesai;
        $proker->tahun =$request->tahun;
      
        $proker->save();
        return redirect('job/proker')->with('sukses','Data Berhasil di Simpan');
    }

    public function prokerdelete($id)
    {
        $proker = \App\Proker::find($id);
        $proker->delete();
        return redirect('job/proker')->with('sukses','Data Berhasil di Hapus');
    }

    public function prokeredit($id)
    {
        $proker = \App\Proker::find($id);
        $divisi = \App\Divisi::all();
        // $data_role =\App\Role::where('kode','LIKE','%'.$request->cari.'%')
        //     ->orWhere('nama','LIKE','%'.$request->cari.'%')
        //     ->paginate(10);//get();
        $departemen = \App\Departemen::where('divisi_kode','=',$proker->divisi_kode)->get();
        return view('job.prokeredit',['data_proker'=>$proker,'data_divisi'=>$divisi,'data_departemen'=>$departemen]);
    }

    public function prokerupdate(Request $request,$id)
    {
        $training= \App\Proker::find($id);
        $training->update($request->all());
        return redirect('job/proker')->with('sukses','Data Berhasil di Update');
    }
}
