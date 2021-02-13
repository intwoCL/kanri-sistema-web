<?php

namespace Database\Seeders;

use App\Models\Inventary\ProductType;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $type = new ProductType();
      $type->name = 'Carro direccional';
      $type->save();

      $type = new ProductType();
      $type->name = 'Comando flecha';
      $type->save();

      $type = new ProductType();
      $type->name = 'Panel flecha';
      $type->save();

      $type = new ProductType();
      $type->name = 'Pedestal flecha';
      $type->save();

      $type = new ProductType();
      $type->name = 'Tablero de conexion';
      $type->save();

      $type = new ProductType();
      $type->name = 'Tablero direccional';
      $type->save();

      $type = new ProductType();
      $type->name = 'Tarjeta electronica';
      $type->save();
    }
}
