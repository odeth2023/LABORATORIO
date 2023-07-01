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
        Schema::create('UserRole', function (Blueprint $table) {
            $table->id('RoleWhichUserHas');

            $table->unsignedBigInteger('idUserType');
            $table->foreign('idUserType')->references('idUserType')->on('UserType')->onDelete('cascade');
            
            $table->unsignedBigInteger('idUser');
            /*$table->foreign('idUser')->references('idUser')->on('MainUser')->onDelete('cascade');*/
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
        Schema::dropIfExists('UserRole');
    }
};
