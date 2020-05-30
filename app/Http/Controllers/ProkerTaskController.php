<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProkerTaskController extends Controller
{
    public function prokertask($id)
    {
        // $prokertask = \App\ProkerTask::paginate(10);
        // $divisi = \App\Divisi::all();
        // $departemen = \App\Departemen::all();
        // return view('job.prokertask',['data_prokertask'=> $prokertask,'data_divisi'=>$divisi,'data_departemen'=>$departemen]);
        return view('job.prokertask');
    }

    public function prokertaskcreate(Request $request)
    {
        $prokertask = new \App\ProkerTask;
        $prokertask->kode =$request->kode;
        $prokertask->nama = $request->nama;
        $prokertask->descripsi =$request->descripsi;
        $prokertask->jenis =$request->jenis;
        $prokertask->departemen_kode =$request->departemen_kode;
        $prokertask->divisi_kode =$request->divisi_kode;
        $prokertask->pic_nik =$request->pic_nik;
        $prokertask->status =$request->status;
        $prokertask->mulai =$request->mulai;
        $prokertask->selesai =$request->selesai;
        $prokertask->tahun =$request->tahun;
      
        $prokertask->save();
        return redirect('job/prokertask')->with('sukses','Data Berhasil di Simpan');
    }

    public function prokertaskdelete($id)
    {
        $prokertask = \App\ProkerTask::find($id);
        $prokertask->delete();
        return redirect('job/prokertask')->with('sukses','Data Berhasil di Hapus');
    }

    public function prokertaskedit($id)
    {
        $prokertask = \App\ProkerTask::find($id);
        return view('job.prokertaskedit',['data_prokertask'=>$prokertask]);
    }

    public function prokertaskupdate(Request $request,$id)
    {
        $training= \App\ProkerTask::find($id);
        $training->update($request->all());
        return redirect('job/prokertask')->with('sukses','Data Berhasil di Update');
    }
}
