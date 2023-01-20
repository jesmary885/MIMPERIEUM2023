<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    protected $model = Image::class;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(150)->create()->each(function(Product $product){
            Image::create([
                'imageable_id' => $product->id,
                'imageable_type' => Product::class,
                'url' => 'products/producto.jfif'
            ]);
            Image::create([
                'imageable_id' => $product->id,
                'imageable_type' => Product::class,
                'url' => 'products/producto2.jfif'
            ]);
            Image::create([
                'imageable_id' => $product->id,
                'imageable_type' => Product::class,
                'url' => 'products/producto3.jfif'
            ]);
            Image::create([
                'imageable_id' => $product->id,
                'imageable_type' => Product::class,
                'url' => 'products/producto4.jfif'
            ]);
        });
    }
}
