<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            /* Celulares y tablets */
            [
                'category_id' => 1,
                'name' => 'Limpieza del hogar',
                'slug' => Str::slug('Limpieza del hogar'),
            ],

            [
                'category_id' => 1,
                'name' => 'Desinfección',
                'slug' => Str::slug('Desinfeccion'),
            ],

            [
                'category_id' => 1,
                'name' => 'Aromatizantes',
                'slug' => Str::slug('Aromatizantes'),
            ],

            /* TV, audio y video */

            [
                'category_id' => 2,
                'name' => 'Telefonia',
                'slug' => Str::slug('Telefonia'),
            ],
            [
                'category_id' => 2,
                'name' => 'Accesorios y partes',
                'slug' => Str::slug('Accesorios y partes'),
            ],

            [
                'category_id' => 2,
                'name' => 'Computación',
                'slug' => Str::slug('Computacion'),
            ],

            /* Consola y videojuegos */
            [
                'category_id' => 3,
                'name' => 'Vídeos, plugins y plantillas',
                'slug' => Str::slug('videos, plugins y plantillas'),
            ],

            [
                'category_id' => 3,
                'name' => 'MP3s y PDFs',
                'slug' => Str::slug('MP3s y PDFs'),
            ],


            /* Computación */

            [
                'category_id' => 4,
                'name' => 'Energizantes',
                'slug' => Str::slug('Energizantes'),
            ],

            [
                'category_id' => 4,
                'name' => 'Vitaminas',
                'slug' => Str::slug('Vitaminas'),
            ],

            [
                'category_id' => 4,
                'name' => 'Remedio para dolencias',
                'slug' => Str::slug('Remedio para dolencias'),
            ],
        ];

        foreach ($subcategories as $subcategory) {
            

            Subcategory::create($subcategory);

        }
    }
}
