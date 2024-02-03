<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'LINEA - ASEO HOGAR + 900 ML',
                'slug' => Str::slug('LINEA-ASEO-HOGAR-+-900-ML'),
                'image' => 'categories/cuidado.jpg',
            ],
            [
                'name' => 'LINEA - ASEO HOGAR - GALON',
                'slug' => Str::slug('LINEA-ASEO-HOGAR-GALON'),
                'image' => 'categories/hogar.jpg',
            ],
         
    

        ];

        foreach ($categories as $category) {
            $category = Category::create($category);

            $brands = Brand::factory(4)->create();

            foreach ($brands as $brand) {
                $brand->categories()->attach($category->id);
            }
        }

    }
}
