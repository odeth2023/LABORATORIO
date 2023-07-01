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
        Schema::create('CategoryChild', function (Blueprint $table) {
            $table->id("idCategoryChild");
            $table->string("name");
            $table->unsignedBigInteger("idCategoryParent");
            $table->foreign("idCategoryParent")->references('idCategoryParent')->on('CategoryParent')->onDelete('cascade');
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
        Schema::dropIfExists('CategoryChild');
    }
};
