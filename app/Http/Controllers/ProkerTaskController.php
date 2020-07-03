<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProkerTaskController extends Controller
{
    public function prokertask($idproker)
    {
        $proker = \App\Proker::find($idproker);
        $prokertask=\App\ProkerTask::where('proker_kode','=',$proker->kode)->paginate(10);
        $status = \App\Param::where('param_key','=','TASKSTS')->orderBy('param_seq','ASC')->get();
        $tahun = \App\Param::where('param_key','=','TH')->orderBy('param_seq','ASC')->get();

        $jenis = \App\Param::where('param_key','=','JENIS')
        ->where('param_value','=',$proker->jenis)->first();

        $statusProker = \App\Param::where('param_key','=','TASKSTS')
        ->where('param_value','=',$proker->status)->first();

        $tipe = \App\Param::where('param_key','=','TIPEPROKER')
        ->where('param_value','=',$proker->tipe)->first();
        
        return view('job.prokertask',
        ['data_proker'=>$proker,
        'data_prokertask'=>$prokertask,
        'data_status'=>$status,
        'data_jenis'=>$jenis,
        'data_tipe'=>$tipe,
        'data_statusproker'=>$statusProker]);
    }

    public function prokertaskcreate(Request $request)
    {
        // {{-- 'kode' 'proker_kode' nama descripsi jenis pic_nik review_nik review_desc status mulai selesai doc_path --}}
        // dd($request->all());
        //cek request ada file

        
        
        $prokertaskCount = \App\ProkerTask::where('proker_kode',$request->proker_kode)->get();
        $prokertask = new \App\ProkerTask;
                if($request->hasfile('doc_path')){
                    $request->file('doc_path')->move('images/',$request->file('doc_path')->getClientOriginalName());
                    $prokertask->doc_path =$request->file('doc_path')->getClientOriginalName();
                }
        $seq = \App\Http\Controllers\TblSeqController::getnewseq('prokertask');
        $prokertask->kode =$request->proker_kode.'-'.($seq->value+1000);
        // $prokertask->kode =$request->kode;
        $prokertask->nama = $request->nama;
        $prokertask->proker_kode =$request->proker_kode;
        $prokertask->descripsi =$request->descripsi;
        $prokertask->jenis = $request->jenis;
        $prokertask->pic_nik =$request->pic_nik;
        $prokertask->review_nik =$request->review_nik;
        $prokertask->review_desc =$request->review_desc;
        $prokertask->status =$request->status;
        $prokertask->mulai =$request->mulai;
        $prokertask->selesai =$request->selesai;
        // $prokertask->doc_path =$request->doc_path; 
        $prokertask->bobot =$request->bobot;   
        $user = Auth::user();  
        $prokertask->create_by =$user->user_id; 
        $prokertask->save();
        $proker = \App\Proker::where('kode',$prokertask->proker_kode)->first();
        return redirect('job/prokertask/'.$proker->id)->with('sukses','Data Berhasil di Simpan');
    }

    public function prokertaskdelete($id)
    {
        $prokertask = \App\ProkerTask::find($id);
        $prokertask->delete();
        $proker = \App\Proker::where('kode',$prokertask->proker_kode)->first();
        return redirect('job/prokertask/'.$proker->id)->with('sukses','Data Berhasil di Hapus');
    }

    public function prokertaskedit($id)
    {
        $prokertask = \App\ProkerTask::find($id);

        $proker = \App\Proker::where('kode',$prokertask->proker_kode)->first();
        $status = \App\Param::where('param_key','=','TASKSTS')->orderBy('param_seq','ASC')->get();
        $tahun = \App\Param::where('param_key','=','TH')->orderBy('param_seq','ASC')->get();

        $jenis = \App\Param::where('param_key','=','JENIS')
        ->where('param_value','=',$proker->jenis)->first();

        $statusProker = \App\Param::where('param_key','=','TASKSTS')
        ->where('param_value','=',$proker->status)->first();

        $tipe = \App\Param::where('param_key','=','TIPEPROKER')
        ->where('param_value','=',$proker->tipe)->first();
        
        return view('job.prokertaskedit',
        ['data_proker'=>$proker,
        'data_prokertask'=>$prokertask,
        'data_status'=>$status,
        'data_jenis'=>$jenis,
        'data_tipe'=>$tipe,
        'data_statusproker'=>$statusProker]);
    }

    public function prokertaskupdate(Request $request,$id)
    {
        $prokertask= \App\ProkerTask::find($id);
        $user = Auth::user(); 

        if($request->hasfile('doc_path_filename')){
            $request->file('doc_path_filename')
                ->move('images/',$request
                ->file('doc_path_filename')
                ->getClientOriginalName());
                $filename = $request->file('doc_path_filename')->getClientOriginalName();
                // dd($request->file('doc_path')->getClientOriginalName());
                $request->request->add([
                    'doc_path'=>$filename,
                ]);
            // $prokertask->doc_path =$request->file('doc_path')->getClientOriginalName();
        }



        $request->request->add([
                'update_by' => $user->user_id,
            ]);
        // dd($request->all());
        $prokertask->update($request->all());
        $proker = \App\Proker::where('kode',$prokertask->proker_kode)->first();
        return redirect('job/prokertask/'.$proker->id)->with('sukses','Data Berhasil di Update');
    }
}
