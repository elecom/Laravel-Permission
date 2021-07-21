<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'Crear']);
        Permission::create(['name' => 'Editar']);
        Permission::create(['name' => 'Ver']);
        Permission::create(['name' => 'Eliminar']);
    }
}
