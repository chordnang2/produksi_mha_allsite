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
        Schema::create('kdc_s_ims0305s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ticket_number');
            $table->string('company');
            $table->string('room');
            $table->dateTime('date_time');
            $table->integer('dt');
            $table->string('pit');
            $table->string('area');
            $table->string('seam');
            $table->string('exa');
            $table->integer('capa');
            $table->string('coal_brand');
            $table->integer('penalty');
            $table->date('tanggal');
            $table->string('shift');
            $table->integer('jam');
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
        Schema::dropIfExists('kdc_s_ims0305s');
    }
};
