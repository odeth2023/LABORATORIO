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
        Schema::create('Reservation', function (Blueprint $table) {
            $table->id('idReservation');
            $table->unsignedBigInteger('idfunction');
            $table->unsignedBigInteger('idCustomer');
            $table->unsignedBigInteger('idSeat');

            
            $table->char('state');
            $table->string('ReservationDate');
            $table->float('total');
            $table->timestamps();


            $table->foreign('idfunction')->references('idfunction')->on('show')->onDelete('cascade');
            $table->foreign('idCustomer')->references('idCustomer')->on('customer')->onDelete('cascade');
            $table->foreign('idSeat')->references('idSeat')->on('seat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Reservation');
    }
};
