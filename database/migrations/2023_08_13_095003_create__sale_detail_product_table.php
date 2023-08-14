<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleDetailProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SaleDetailProduct', function (Blueprint $table) {
            $table->id('idSaleDetailProduct');
            $table->integer("quantity");

            $table->unsignedBigInteger('idSale');
            $table->foreign('idSale')->references("idSale")->on("sale")->onDelete('cascade');
            
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
           
            $table->unsignedBigInteger('idConfectionery');
            $table->foreign('idConfectionery')->references("idConfectionery")->on("ProductConfectionery")->onDelete('cascade');
            
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
        Schema::dropIfExists('SaleDetailProduct');
    }
}
