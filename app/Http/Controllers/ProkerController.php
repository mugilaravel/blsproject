<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ProkerController extends Controller
{
    public function proker(Request $request)
    {
        // $test = \App\Http\Controllers\TblSeqController::getnewseq('z');
        // $seq = ($test->value);
        
        // if($request->has('tahuncari')){ //cek parameter cari apakah ada nilai
        //     // $data_siswa =\App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')
        //     //             ->orWhere('nama_belakang','LIKE','%'.$request->cari.'%')
        //     //             ->paginate(10);//get();
        // }else{
        //     //bila tidak ada parameter request, tampilkan semua
        //     // $data_siswa = \App\Siswa::all();
        //     //bila tidak ada parameter request, tampilkan semua
        //     // $data_siswa = \App\Siswa::paginate(10);
        // }





        $user = Auth::user();
        if($user->role=='ADM'){
            $proker = \App\Proker::paginate(10);
            $divisi = \App\Divisi::All();//where('kode','=',$user->divisi_kode)->get();
            $departemen = \App\Departemen::All();//where('kode','=',$user->departemen_kode)->get();
        }else{
            $proker = \App\Proker::where('divisi_kode','=',$user->divisi_kode);
            $proker=$proker->where('departemen_kode','=',$user->departemen_kode);

            if($request->has('tahuncari')){ //cek parameter cari apakah ada nilai
                if($request->tahuncari != ''){
                    $proker=$proker->where('tahun','=',$request->tahuncari);
                }
            }

            if($request->has('prokercari')){ //cek parameter cari apakah ada nilai
                if($request->prokercari != ''){
                    $proker=$proker->where('nama','LIKE','%'.$request->prokercari.'%');
                }
            }

            $proker=$proker->paginate(10);

            // dd($proker);
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
                                    'data_departemen'=>$departemen,
                                    'tahuncari'=>$request->tahuncari,
                                    'prokercari'=>$request->prokercari]);
    }

    public function prokercreate(Request $request)
    {

        $th = Str::substr($request->tahun, 2, 2);
        $prokerCount = \App\Proker::where('departemen_kode','=',$request->departemen_kode)->get();
        $proker = new \App\Proker;
        //rubah pake squence ya ..............................
        $seq = \App\Http\Controllers\TblSeqController::getnewseq('prokerseq');
        $proker->kode =$request->departemen_kode.$th.(($seq->value)+1000);
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
        $user = Auth::user();
        $proker->create_by=$user->user_id;

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
    }

    public function prokerupdate(Request $request,$id)
    {
        $training= \App\Proker::find($id);
        $user = Auth::user();
        $request->request->add(['update_by' => $user->user_id]);
        $training->update($request->all());
        return redirect('job/proker')->with('sukses','Data Berhasil di Update');
    }
}
