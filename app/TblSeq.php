<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblSeq extends Model
{
    protected $table ='tblseq';
    protected $fillable = ['nama','value','versi'        
    ];

    private function testz($id)
    {
        dd($id->all());
    }
}
