<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'Administrador']);
        $roleVisor = Role::create(['name' => 'Visor']);
        $roleEditor = Role::create(['name' => 'Editor']);
    }
}
