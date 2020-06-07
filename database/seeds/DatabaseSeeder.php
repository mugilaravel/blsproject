<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'admin',
            'email'=>'admin@gmail.com',
            'user_id'=>'admin',
            'password'=>'$2y$10$VtgMmNr7xn8ikYXqVBiOHuY.CsGqDnddBajEk/p7n4KRcRGlW3X96',
            'role'=>'ADM']
        ]);   
        
        DB::table('param')->insert([
            ['param_key'=>'TH',
            'param_value'=>'2019',
            'param_desc'=>'Tahun',
            'param_status'=>'Y',
            'param_seq'=>1],
            ['param_key'=>'TH',
            'param_value'=>'2020',
            'param_desc'=>'Tahun',
            'param_status'=>'Y',
            'param_seq'=>1],
            ['param_key'=>'CONFIRM',
            'param_value'=>'Y',
            'param_desc'=>'YES',
            'param_status'=>'Y',
            'param_seq'=>1],
            ['param_key'=>'CONFIRM',
            'param_value'=>'N',
            'param_desc'=>'NO',
            'param_status'=>'Y',
            'param_seq'=>1]
        ]);   

        
    }
}
