<?php

namespace Database\Seeders;

use App\Models\System\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role = new Role();
      $role->name = 'admin';
      $role->description = 'Administrador';
      $role->save();

      $role = new Role();
      $role->name = 'user';
      $role->description = 'Usuario';
      $role->save();
      
    }
}
