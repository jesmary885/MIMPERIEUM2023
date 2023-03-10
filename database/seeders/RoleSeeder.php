<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'cliente']);

        //Inicio

        Permission::create(['name' => 'home',
          'description' => 'Inicio'])->syncRoles([$role1,$role2]);

        //Administración

        Permission::create(['name' => 'admin.index',
        'description' => 'admin'])->syncRoles([$role1]);
  
    }
}
