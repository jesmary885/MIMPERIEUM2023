<?php

namespace Database\Seeders;

use App\Models\ActivacionMembresia;
use Illuminate\Database\Seeder;

class ActivacionMembresiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActivacionMembresia::create([
            'activacion_comision' => '20'
        ]);
    }
}
