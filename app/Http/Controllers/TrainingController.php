<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function training()
    {
        $training = \App\Training::paginate(10);;
    return view('training.training',['data_training'=> $training]);
    }

    public function trainingcreate(Request $request)
    {
        $training = new \App\Training;
        $training->kode =$request->kode;
        $training->nama = $request->nama;
        $training->skill =$request->skill;
        $training->program =$request->program;  
        $training->tgl_mulai=$request->tgl_mulai;    
        $training->tgl_akhir=$request->tgl_akhir;    
        $training->save();

        return redirect('training/training')->with('sukses','Data Berhasil di Simpan');
    }

    public function trainingdelete($id)
    {
        $training = \App\Training::find($id);
        $training->delete();
        return redirect('training/training')->with('sukses','Data Berhasil di Hapus');
    }

    public function trainingedit($id)
    {
        $training = \App\Training::find($id);
        return view('training.trainingedit',['data_training'=>$training]);
    }

    public function trainingupdate(Request $request,$id)
    {
        $training= \App\Training::find($id);
        $training->update($request->all());
        return redirect('training/training')->with('sukses','Data Berhasil di Update');
    }

    public function traininglist()
    {
        $training = \App\Training::paginate(10);;
    return view('training.traininglist',['data_training'=> $training]);
    }



}
