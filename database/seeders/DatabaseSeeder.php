<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

      $this->truncateTables([
        'in_products',
        'in_categories',
        'in_product_type',
        'in_units',
        'sys_users',
        'sys_roles',
        'sys_company',
      ]);

        Artisan::call('cities:import');

        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductTypeSeeder::class);
        $this->call(UnitSeeder::class);


        $this->call(CompanySeeder::class);
    }

    public function truncateTables(array $tables)
    {
      DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
      foreach ($tables as $table) {
        DB::table($table)->truncate();
      }
      DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
