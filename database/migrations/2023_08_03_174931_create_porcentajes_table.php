<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePorcentajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('porcentajes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->float('bono_compra')->nullable();

            $table->float('bono_residual_n1')->nullable();
            $table->float('bono_residual_n2')->nullable();
            $table->float('bono_residual_n3')->nullable();
            $table->float('bono_residual_n4')->nullable();
            $table->float('bono_residual_n5')->nullable();
            $table->float('bono_residual_n6')->nullable();
            
            $table->float('bono_global_r2')->nullable();
            $table->float('bono_global_r3')->nullable();
            $table->float('bono_global_r4')->nullable();
            $table->float('bono_global_r5')->nullable();

            $table->float('monto_activacion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('porcentajes');
    }
}
