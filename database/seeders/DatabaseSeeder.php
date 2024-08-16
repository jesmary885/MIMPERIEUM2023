<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       /* Storage::deleteDirectory('categories');
        Storage::deleteDirectory('subcategories');
        Storage::deleteDirectory('products');

        Storage::makeDirectory('categories');
        Storage::makeDirectory('subcategories');
        Storage::makeDirectory('products');
*/
        $this->call(PaisSeeder::class);
        $this->call(RangoSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        
        $this->call(PorcentajeSeeder::class);
       // $this->call(ProductSeeder::class);
    }
}
