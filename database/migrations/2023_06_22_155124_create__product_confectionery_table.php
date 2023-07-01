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
        Schema::create('ProductConfectionery', function (Blueprint $table) {
            $table->id("idConfectionery");
            $table->string("name");
            $table->float("price");
            $table->integer("quantity");
            $table->char("state");
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
        Schema::dropIfExists('ProductConfectionery');
    }
};
