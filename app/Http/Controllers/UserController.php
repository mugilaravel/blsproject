<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

// untuk export
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function user()
    {
            $data_user = \App\User::paginate(10);;
            $divisi = \App\Divisi::All();
            $departemen = \App\Departemen::All();
            $role = \App\Param::where('param_key','=','ROLE')->orderBy('param_seq','ASC')->get();
        return view('admin.user',['data_user'=> $data_user,
                                    'data_divisi'=>$divisi,
                                    'data_departemen'=>$departemen,
                                    'data_role'=>$role
        ]);
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
        $divisi = \App\Divisi::All();
        $departemen = \App\Departemen::All();
        $role = \App\Param::where('param_key','=','ROLE')->orderBy('param_seq','ASC')->get();
        return view('admin/useredit',['user'=>$useredit,'data_divisi'=>$divisi,'data_role'=>$role,
        'data_departemen'=>$departemen]);
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

// export
   

    public function exportPdf() 
    {
        $pdf = PDF::loadView('pdf.invoice', $data);
        return $pdf->download('invoice.pdf');
    }

}
