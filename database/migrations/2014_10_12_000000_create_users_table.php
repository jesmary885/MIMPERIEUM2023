<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

             //mi rango
             $table->unsignedBigInteger('rango_id')->nullable();
             $table->foreign('rango_id')->references('id')->on('rangos');

             $table->unsignedBigInteger('pais_id')->nullable();
             $table->foreign('pais_id')->references('id')->on('pais');

            $table->string('dni')->nullable();
            $table->string('code')->nullable();
            $table->string('phone')->nullable();
            $table->string('direction')->nullable();
            $table->string('status')->nullable();
            $table->float('points')->nullable();
            $table->float('points_residual')->nullable();
            $table->float('acum_points')->nullable();
            $table->float('points_global')->nullable();
            
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
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
        Schema::dropIfExists('users');
    }
}
