<?php

namespace Database\Seeders;

use App\Models\Rango;
use Illuminate\Database\Seeder;

class RangoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rangos = [
            [
                'name' => 'Socio',
            ],
            [
                'name' => 'Diamante',
            ],
            [
                'name' => 'Diamante corona',
            ],

            [
                'name' => 'Diamante embajador',
  
            ],
            [
                'name' => 'Diamante Imperial',
  
            ],


        ];

        foreach ($rangos as $rango) {
            $category = Rango::create($rango);

        }

    }
}
