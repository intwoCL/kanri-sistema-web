<?php

namespace Database\Seeders;

use App\Models\System\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new User();
      $user->email = 'pablo.ignacio288@gmail.com';
      $user->password  = hash('sha256', '123456');
      $user->first_name = 'Pablo';
      $user->last_name = 'Pena';
      $user->rol_id = '1';
      $user->account_token = '1234';
      $user->save();

      $user = new User();
      $user->email = 'benja.torres@hotmail.cl';
      $user->password  = hash('sha256', '12345678');
      $user->first_name = 'Benja';
      $user->last_name = 'Torres';
      $user->rol_id = '2';
      $user->account_token = '12345';
      $user->save();
    }
}
