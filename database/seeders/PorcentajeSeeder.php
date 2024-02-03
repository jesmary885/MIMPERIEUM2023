<?php

namespace Database\Seeders;

use App\Models\Porcentaje;
use Illuminate\Database\Seeder;

class PorcentajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Porcentaje::create( [
            'bono_compra'=>10,
            'bono_residual_n1'=>'1',
            'bono_residual_n2'=>'1',
            'bono_residual_n3'=>'2',
            'bono_residual_n4'=>'2',
            'bono_residual_n5'=>'3',
            'bono_residual_n6'=>'3',
            'bono_global_r2'=>'0.25',
            'bono_global_r3'=>'0.25',
            'bono_global_r4'=>'0.25',
            'bono_global_r5'=>'0.25',
            'monto_activacion'=>'30',
            ] );
    }
}
