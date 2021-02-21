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
      $company->run = '0000000-k';
      $company->name_owner = 'Empresa s.a';
      $company->name_company = "Empresa s.a";
      $company->type = 'Electronica, mecaninca, etc...';
      $company->address = 'Av. 123123';
      $company->city_id = 1039;
      $company->phone = '9999999';
      $company->email = 'empresa@demo.com';
      $company->web_site = 'www.empresa.com';
      $company->color_company = '#007bff';
      $company->save();
    }
}
