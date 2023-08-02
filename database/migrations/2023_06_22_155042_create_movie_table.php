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
        Schema::create('movie', function (Blueprint $table) {
            $table->id('idMovie');
            $table->string("name");
            $table->string("img");
            $table->string("description");
            $table->string("duracion");
            $table->float("price");
            $table->char("state");
            $table->char("billboard");
            $table->unsignedBigInteger("idCategoryChild");

            $table->foreign('idCategoryChild')->references('idCategoryChild')->on('CategoryChild')->onDelete('cascade');

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
        Schema::dropIfExists('movie');
    }
};
