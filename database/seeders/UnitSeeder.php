<?php

namespace Database\Seeders;

use App\Models\Inventary\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $unit = new Unit();
      $unit->name = 'Metro';
      $unit->save();

      $unit = new Unit();
      $unit->name = 'Unidad';
      $unit->save();
    }
}
