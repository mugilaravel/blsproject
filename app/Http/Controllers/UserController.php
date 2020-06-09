<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function user()
    {

        // if($request->has('cari')){ //cek parameter cari apakah ada nilai
        //     //cari data siswa dengan kriteria nama_depan %like%
        //     $data_role =\App\Role::where('kode','LIKE','%'.$request->cari.'%')
        //     ->orWhere('nama','LIKE','%'.$request->cari.'%')
        //     ->paginate(10);//get();
        // }else{
        //     //bila tidak ada parameter request, tampilkan semua
            $data_user = \App\User::paginate(10);;
            //  dd($data_user->all());
        // }
        return view('admin.user',['data_user'=> $data_user]);
    }


    public function create(Request $request)
    {
        $user = new \App\User;
        $user->role ='USR';
        $user->user_id = $request->user_id;
        $user->name = $request->name;
        $user->email =$request->email;
        $user->divisi_kode =$request->divisi_kode;
        $user->departemen_kode =$request->departemen_kode;
        $user->password =bcrypt($request->password);
        $user->remember_token=Str::random(60);        
        $user->save();

        return redirect('admin/user')->with('sukses','Data Berhasil di Input');
    }

    public function useredit($id)
    {        
        $useredit = \App\User::find($id);
        return view('admin/useredit',['user'=>$useredit]);
    }

    public function userupdate(Request $request,$id)
    {
        $user= \App\User::find($id);
        $user->update($request->all());
        return redirect('admin/user')->with('sukses','Data Berhasil di Update');
    }

    public function userdelete($id)
    {        
        $user = \App\User::find($id);
        $user->delete();
        return redirect('admin/user')->with('sukses','Data Berhasil di Hapus');
    }


    public function userfindbyid($nik){
        $user = \App\User::where('user_id','=',$nik)->first();
        return json_encode($user);
    }



}
