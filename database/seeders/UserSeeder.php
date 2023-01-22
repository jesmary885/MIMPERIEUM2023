<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //$role = Role::create(['name' => 'admin']);

        User::create([
            'name' => 'Juan Huaman',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'dni' => '123456789',
            'code' => '00000000000',
            'status' => 'activo',
            'points' => 0,
            'points_residual' => 0,
            'points_global' => 0,
        ])->assignRole('admin');

       /* User::create([
            'name' => 'Jesmary',
            'email' => 'jesmary@admin.com',
            'password' => bcrypt('12345678'),
            'dni' => '111111111',
            'code' => '00000002',
            'status' => 'activo',
            'points' => 0,
            'points_residual' => 0,
        ])->assignRole('admin');*/

       // User::factory(10)->create();
    }
}
