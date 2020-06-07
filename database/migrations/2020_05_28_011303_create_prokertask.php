<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProkertask extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prokertask', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('proker_kode');
            $table->string('nama');
            $table->string('descripsi')->nullable();
            $table->string('jenis')->nullable();;
            $table->string('pic_nik')->nullable();;
            $table->string('review_nik')->nullable();;
            $table->string('review_desc')->nullable();;
            $table->string('status')->nullable();;
            $table->date('mulai')->nullable();
            $table->date('selesai')->nullable();
            $table->string('doc_path')->nullable();;
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
        Schema::dropIfExists('prokertask');
    }
}
