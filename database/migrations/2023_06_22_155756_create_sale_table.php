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
        Schema::create('sale', function (Blueprint $table) {
            $table->id('idSale');
            $table->float('total');
            $table->string('DateSale');
            $table->unsignedBigInteger('idCustomer');
            $table->unsignedBigInteger('idMovie');

            $table->foreign('idCustomer')->references('idCustomer')->on('customer')->onDelete('cascade');
            $table->foreign('idMovie')->references('idMovie')->on('movie')->onDelete('cascade');

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
        Schema::dropIfExists('sale');
    }
};
