<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TblSeqController extends Controller
{
    static public function getnewseq($nama)
    {
        $tblseq = \App\TblSeq::where('nama','=',$nama)->first();
// dd($tblseq);
        if ($tblseq == null) {
            $seq = new \App\TblSeq;
            $seq->nama =$nama;
            $seq->value = 1;
            $seq->versi = 1;
            $seq->save();
        }else{
            $seqval = $tblseq->value + 1;
            $tblseq->value = $seqval;
            $tblseq->save();
        }
        return \App\TblSeq::where('nama','=',$nama)->first();



    }
}
