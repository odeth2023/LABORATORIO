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
        Schema::create('ReservationDetail', function (Blueprint $table) {
            $table->id('idDetailReservation');
            $table->unsignedBigInteger('idReservation');
            $table->unsignedBigInteger('idConfectionery');

            $table->foreign('idReservation')->references('idReservation')->on('Reservation')->onDelete('cascade');
            $table->foreign('idConfectionery')->references('idConfectionery')->on('ProductConfectionery')->onDelete('cascade');

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
        Schema::dropIfExists('ReservationDetail');
    }
};
