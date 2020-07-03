<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblkantor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblkantor', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('nama')->nullable();
            $table->string('type')->nullable();
            $table->string('induk')->nullable();
            $table->string('kode_passion')->nullable();
            // $table->string('')->nullable();
            // $table->string('')->nullable();
            // $table->string('')->nullable();
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
        Schema::dropIfExists('tblkantor');
    }
}
