<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seatdetail', function (Blueprint $table) {
            $table->id('seatdetail');
            $table->unsignedBigInteger("idSeat");
            $table->unsignedBigInteger("idRoom");

            $table->foreign('idSeat')->references('idSeat')->on('seat');
            $table->foreign('idRoom')->references('idRoom')->on('room');

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
        Schema::dropIfExists('seatdetail');
    }
}
