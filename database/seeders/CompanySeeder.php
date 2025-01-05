<?php

namespace Database\Seeders;

use App\Models\System\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $company = new Company();
      $company->run = '14285735-9';
      $company->name_owner = 'Pablo Peña';
      $company->name_company = "PPEquipamientos";
      $company->type = 'Electronica, mecaninca, etc...';
      $company->address = 'Santa Sara 11826';
      $company->city_id = 1004;
      $company->phone = '992493849';
      $company->email = 'ppena@ppequipamientos.cl';
      $company->web_site = 'www.ppequipamientos.cl';
      $company->color_company = '#007bff';
      $company->save();
    }
}
