<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama');
            $table->string('branch_code')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('grade_code')->nullable();
            $table->string('grade_desc')->nullable();
            $table->string('jabatan_code')->nullable();
            $table->string('jabatan_desc')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->date('tgl_pensiun')->nullable();
            $table->string('status_peg')->nullable();
            $table->string('aktif_pensiun')->nullable();
            $table->string('password')->nullable();
            $table->string('email')->nullable();
            $table->string('is_aktif')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('handphone_1')->nullable();
            $table->string('handphone_2')->nullable();
            $table->string('createBy')->nullable();
            $table->string('createDate')->nullable();
            $table->string('updateBy')->nullable();
            $table->string('updateDate')->nullable();
            $table->string('userClient')->nullable();
            $table->integer('versi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
