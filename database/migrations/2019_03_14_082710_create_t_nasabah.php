<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTNasabah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_nasabah', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('no_rekening', 20);
            $table->string('nama', 255);
            $table->string('alamat', 255);
            $table->integer('telepon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_nasabah');
    }
}
