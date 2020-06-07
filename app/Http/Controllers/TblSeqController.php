<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TblSeqController extends Controller
{
    public function getnewseq($nama)
    {
        // $tblseq = \App\TblSeq::where('nama','=',$nama)->first();
        $tblseq =\App\Proker::All();
        dd($tblseq->all());
        // return json_encode($tblseq);
    }
}
