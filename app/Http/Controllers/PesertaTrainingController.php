<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesertaTrainingController extends Controller
{
    public function pesertatraining($kode)
    {
        $pesertatraining = \App\PesertaTraining::where('kode','=',$kode)->paginate(10);
        $training= \App\Training::where('kode','=',$kode)->firstOrFail();
    return view('training.pesertatraining',['data_pesertatraining'=> $pesertatraining,
    'data_training'=>$training]);
    }

    public function pesertatrainingcreate(Request $request)
    {
        $training = new \App\PesertaTraining;
        $training->user_id =$request->user_id;
        $training->kode =$request->kode;
        $training->nilai = $request->nilai;
        $training->atasan =$request->atasan;
        $training->bawahan =$request->bawahan;  
        $training->sejawat=$request->sejawat;    
        $training->save();

        return redirect('training/pesertatraining/'.$training->kode)->with('sukses','Data Berhasil di Simpan');
    }

    public function pesertatrainingdelete($id)
    {
        $training = \App\PesertaTraining::find($id);
        $training->delete();
        return redirect('training/pesertatraining/'.$training->kode)->with('sukses','Data Berhasil di Hapus');
    }

    public function pesertatrainingedit($id)
    {
        $training = \App\PesertaTraining::find($id);
        return view('training.pesertatrainingedit',['data_training'=>$training]);
    }

    public function pesertatrainingupdate(Request $request,$id)
    {
        $training= \App\PesertaTraining::find($id);
        $training->update($request->all());
        return redirect('training/pesertatraining')->with('sukses','Data Berhasil di Update');
    }



}
