<?php

namespace Database\Seeders;

use App\Models\Inventary\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $category = new Category();
      $category->name = 'Accesorios';
      $category->save();

      $category = new Category();
      $category->name = 'Balizas';
      $category->save();

      $category = new Category();
      $category->name = 'Focos';
      $category->save();

      $category = new Category();
      $category->name = 'Flechas';
      $category->save();

      $category = new Category();
      $category->name = 'Luces';
      $category->save();

      $category = new Category();
      $category->name = 'Moto';
      $category->save();

      $category = new Category();
      $category->name = 'Sirenas';
      $category->save();
    }
}
