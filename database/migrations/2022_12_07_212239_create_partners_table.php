<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //Yo en tabla usuarios
            $table->foreignId('user_id')->constrained();

            //usuario patrocinador
            $table->unsignedBigInteger('refer_id');
            $table->foreign('refer_id')->references('id')->on('users');

            $table->string('status');
            
            $table->unsignedBigInteger('rango_id');
            $table->foreign('rango_id')->references('id')->on('rangos');

          /*  $table->integer('binary_level')->nullable();
            $table->integer('community_binary_level')->nullable(); //cuantoa tengo directos en binario

            $table->integer('unilevel')->nullable();
            $table->integer('community_unilevel')->nullable(); //cuantos tengo directo en unilevel*/
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners');
    }
}
