<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ProkerController extends Controller
{
    public function proker()
    {

        // Get the currently authenticated user...
        $user = Auth::user();
        if($user->role=='ADM'){
            $proker = \App\Proker::paginate(10);
            $divisi = \App\Divisi::All();//where('kode','=',$user->divisi_kode)->get();
            $departemen = \App\Departemen::All();//where('kode','=',$user->departemen_kode)->get();
        }else{
            $proker = \App\Proker::where('divisi_kode','=',$user->divisi_kode)
            ->where('departemen_kode','=',$user->departemen_kode)
            ->paginate(10);
            $departemen = \App\Departemen::where('kode','=',$user->departemen_kode)->get();
            $divisi = \App\Divisi::where('kode','=',$user->divisi_kode)->get();
        }
        $tahun = \App\Param::where('param_key','=','TH')->orderBy('param_seq','ASC')->get();
        $jenis = \App\Param::where('param_key','=','JENIS')->orderBy('param_seq','ASC')->get();
        $status = \App\Param::where('param_key','=','TASKSTS')->orderBy('param_seq','ASC')->get();
        $tipe = \App\Param::where('param_key','=','TIPEPROKER')->orderBy('param_seq','ASC')->get();
        return view('job.proker',['data_proker'=> $proker,
                                    'data_divisi'=>$divisi,
                                    'data_tahun'=>$tahun,
                                    'data_jenis'=>$jenis,
                                    'data_status'=>$status,
                                    'data_tipe'=>$tipe,
                                    'data_departemen'=>$departemen]);
    }

    public function prokercreate(Request $request)
    {
        $th = Str::substr($request->tahun, 2, 2);
        $prokerCount = \App\Proker::where('departemen_kode','=',$request->departemen_kode)->get();
        $proker = new \App\Proker;
        $proker->kode =$request->departemen_kode.$th.($prokerCount->count()+1001);
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
        $proker->tipe =$request->tipe;
      
        $proker->save();
        return redirect('job/proker')->with('sukses','Data Berhasil di Simpan');
    }

    public function prokerdelete($id)
    {
        $proker = \App\Proker::find($id);

        $prokertask=\App\ProkerTask::where('proker_kode','=',$proker->kode)->get();
        if($prokertask->count()>0){
            return redirect('job/proker')->with('sukses','Data tidak bisa di hapus, masih mempunya task.....');
        }else{
            $proker->delete();
            return redirect('job/proker')->with('sukses','Data Berhasil di Hapus');
        }
    }

    public function prokeredit($id)
    {
        
        $proker = \App\Proker::find($id);
        $user = Auth::user();
        if($user->role=='ADM'){
            $divisi = \App\Divisi::All();//where('kode','=',$user->divisi_kode)->get();
            $departemen = \App\Departemen::All();//where('kode','=',$user->departemen_kode)->get();
        }else{
            $departemen = \App\Departemen::where('kode','=',$user->departemen_kode)->get();
            $divisi = \App\Divisi::where('kode','=',$user->divisi_kode)->get();
        }
        // $divisi = \App\Divisi::all();
        // $departemen = \App\Departemen::where('divisi_kode','=',$proker->divisi_kode)->get();

        $tahun = \App\Param::where('param_key','=','TH')->orderBy('param_seq','ASC')->get();
        $jenis = \App\Param::where('param_key','=','JENIS')->orderBy('param_seq','ASC')->get();
        $status = \App\Param::where('param_key','=','TASKSTS')->orderBy('param_seq','ASC')->get();
        $tipe = \App\Param::where('param_key','=','TIPEPROKER')->orderBy('param_seq','ASC')->get();
        return view('job.prokeredit',['data_proker'=> $proker,
                                    'data_divisi'=>$divisi,
                                    'data_tahun'=>$tahun,
                                    'data_jenis'=>$jenis,
                                    'data_status'=>$status,
                                    'data_tipe'=>$tipe,
                                    'data_departemen'=>$departemen]);




        // return view('job.prokeredit',['data_proker'=>$proker,'data_divisi'=>$divisi,'data_departemen'=>$departemen]);
    }

    public function prokerupdate(Request $request,$id)
    {
        $training= \App\Proker::find($id);
        $training->update($request->all());
        return redirect('job/proker')->with('sukses','Data Berhasil di Update');
    }
}
