<?php

namespace App\Services;
class SeqService{
    public  function testService($test)
    {
        $divisi = \App\Divisi::all();
        return $divisi;
    }
}
