<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleDetailMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SaleDetailMovie', function (Blueprint $table) {
            $table->id('idSaleDetailMovie');

            $table->unsignedBigInteger('idSale');
            $table->foreign('idSale')->references("idSale")->on("sale")->onDelete('cascade');

            $table->integer("quantity");
            
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('idfunction');
            $table->foreign('idfunction')->references('idfunction')->on('Show')->onDelete('cascade');
           
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
        Schema::dropIfExists('SaleDetailMovie');
    }
}
