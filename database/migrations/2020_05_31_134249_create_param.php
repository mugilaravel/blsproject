<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('param', function (Blueprint $table) {
            $table->id();
            $table->string('param_key');
            $table->string('param_value');
            $table->string('param_desc')->nullable();;
            $table->string('param_status');
            $table->integer('param_seq')->nullable();;
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
        Schema::dropIfExists('param');
    }
}
