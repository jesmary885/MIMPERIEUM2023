<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenidowebsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenidowebs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('url')->nullable();
            $table->longText('texto1')->nullable();
            $table->longText('texto2')->nullable();
            $table->longText('texto3')->nullable();
            $table->string('area');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contenidowebs');
    }
}
