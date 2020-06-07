<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartemenController extends Controller
{
    public function departemen()
    {
        $tset = new \App\Services\SeqService();
        $tset->testService('ssskdhasdhskaj');
        // dd($tset->testService('ssskdhasdhskaj')->all());
        $departemen = \App\Departemen::paginate(10);;
        $divisi =\App\Divisi::all();
       return view('admin.departemen',['data_departemen'=> $departemen,'data_divisi'=>$divisi]);
    }

    public function departemencreate(Request $request)
    {
        $departemen = new \App\Departemen;
        $departemen->kode =$request->kode;
        $departemen->nama = $request->nama;
        $departemen->nik_kadept =$request->nik_kadept;
        $departemen->nama_kadept =$request->nama_kadept;  
        $departemen->divisi_kode =$request->divisi_kode; 
        $departemen->save();
        return redirect('admin/departemen')->with('sukses','Data Berhasil di Simpan');
    }
    
    public function departemendelete($id)
    {
        $departemen = \App\Departemen::find($id);
        $departemen->delete();
        return redirect('admin/departemen')->with('sukses','Data Berhasil di Hapus');
    }

    public function departemenedit($id)
    {
        $departemen = \App\Departemen::find($id);
        $divisi = \App\Divisi::all();
        return view('admin.departemenedit',['data_departemen'=>$departemen,'data_divisi'=>$divisi]);
    }

    public function departemenupdate(Request $request,$id)
    {
        $training= \App\Departemen::find($id);
        $training->update($request->all());
        return redirect('admin/departemen')->with('sukses','Data Berhasil di Update');
    }



    public function departemenbydivisi($divisi_kode)
    {
        $user = Auth::user();
        if($user->role=='ADM'){
            $departemen = \App\Departemen::where('divisi_kode','=',$divisi_kode)
            ->get();
            return json_encode($departemen);
        }else{
            $departemen = \App\Departemen::where('divisi_kode','=',$divisi_kode)
            ->where('kode','=',$user->departemen_kode)->get();
            return json_encode($departemen);
        }
    }

}
