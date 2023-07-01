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
        Schema::create('MovieShow', function (Blueprint $table) {
            $table->id('idfunction');
            $table->string('schedule');
            $table->unsignedBigInteger('idMovie');
            $table->unsignedBigInteger('idRoom');


            $table->foreign('idMovie')->references('idMovie')->on('movie')->onDelete('cascade');
            $table->foreign('idRoom')->references('idRoom')->on('room')->onDelete('cascade');

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
        Schema::dropIfExists('MovieShow');
    }
};
