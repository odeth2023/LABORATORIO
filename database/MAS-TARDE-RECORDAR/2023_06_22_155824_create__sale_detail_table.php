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
        Schema::create('SaleDetail', function (Blueprint $table) {
            $table->id('idSaleDetail');
            $table->unsignedBigInteger('idSale');
            $table->unsignedBigInteger('idConfectionery');
            $table->integer('quantity')->length(10);


            $table->foreign('idSale')->references("idSale")->on("sale")->onDelete('cascade');
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
        Schema::dropIfExists('SaleDetail');
    }
};
