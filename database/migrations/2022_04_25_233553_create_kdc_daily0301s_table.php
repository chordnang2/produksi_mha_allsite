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
        Schema::create('kdc_daily0301s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ticket_number');
            $table->string('brand');
            $table->string('silo');
            $table->dateTime('date_time');
            $table->integer('tractor');
            $table->string('driver');
            $table->string('vessel1');
            $table->string('vessel2');
            $table->integer('capa1');
            $table->integer('capa2');
            $table->string('company');
            $table->string('silo_2');
            $table->date('tgl_rfid');
            $table->integer('jam');
            $table->string('shift');
            $table->integer('ton');
            $table->string('group');
            $table->date('tgl_tmst');
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
        Schema::dropIfExists('kdc_daily0301s');
    }
};
