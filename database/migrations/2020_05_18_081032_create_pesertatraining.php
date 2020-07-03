<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertatraining extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesertatraining', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('user_id');
            $table->string('kantor_kode')->nullable();
            $table->integer('nilai')->nullable();
            $table->string('atasan')->nullable();
            $table->string('bawahan')->nullable();
            $table->string('sejawat')->nullable();
            
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
        Schema::dropIfExists('pesertatraining');
    }
}
