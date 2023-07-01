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
        Schema::create('customer', function (Blueprint $table) {
            $table->id('idCustomer');
            $table->integer('dni');
            $table->string('name');
            $table->string('lastname');
            $table->char('sort');
            $table->integer('phone');
            $table->string('address');
            $table->string('email');
            $table->unsignedBigInteger('idUser');

            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('customer');
    }
};
