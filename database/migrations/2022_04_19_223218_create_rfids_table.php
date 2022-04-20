<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rfids', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('silo');
            $table->string('date_time');
            $table->string('tractor');
            $table->string('driver');
            $table->string('vessel1');
            $table->string('vessel2');
            $table->string('capa1');
            $table->string('capa2');
            $table->string('company');
            $table->string('silo_2');
            $table->string('tgl_rfid');
            $table->string('jam');
            $table->string('shift');
            $table->string('ton');
            $table->string('group');
            $table->string('tgl_tmst');
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
        Schema::dropIfExists('rfids');
    }
};
