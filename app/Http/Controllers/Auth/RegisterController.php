<?php

namespace App\Http\Controllers\Auth;

use App\Models\System\Role;
use App\Models\System\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
  protected function create()
  {
    $user = User::create([
      'email'=> $data['email'],
      'password' => Hash::make($data['password']),
      'first_name' => $data['first_name'],
      'last_name' => $data['last_name'],
    ]);

    $user->roles()->attach(Role::where('name', 'user')->first());

    return $user;
  }
}
