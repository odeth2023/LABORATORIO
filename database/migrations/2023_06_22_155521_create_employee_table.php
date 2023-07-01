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
        Schema::create('employee', function (Blueprint $table) {
            $table->id('idEmployee');
            $table->string('name');
            $table->string('lastname');
            $table->char('sort');
            $table->integer('phone');
            $table->string('DateBirth');
            $table->char('DocumentType');
            $table->integer('DocumentNum');
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
        Schema::dropIfExists('employee');
    }
};
