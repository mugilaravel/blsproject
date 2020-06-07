<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proker', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('nama');
            $table->string('descripsi')->nullable();
            $table->string('jenis');
            $table->string('departemen_kode');
            $table->string('divisi_kode');
            $table->string('pic_nik');
            $table->string('status');
            $table->date('mulai')->nullable();
            $table->date('selesai')->nullable();
            $table->string('tahun');
            $table->string('tipe');
            $table->string('image_path');
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
        Schema::dropIfExists('proker');
    }
}
