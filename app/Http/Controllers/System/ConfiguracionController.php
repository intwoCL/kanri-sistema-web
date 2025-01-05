<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Services\ImportImage;
use Illuminate\Http\Request;
use App\Http\Requests\AuthUsuarioPasswordRequest as PasswordUserRequest;

class ConfiguracionController extends Controller
{

    public function profile(){
        $u = current_user();
        return view('config.perfil', compact('u'));
    }

    public function profileStore(Request $request){
        try {
          $user = current_user();
          $user->first_name = $request->input('first_name');
          $user->last_name = $request->input('last_name');
    
          if($user->email != $request->input('email')){
            $request->validate([
              'email' => 'required|min:4|max:100|email|unique:s_usuario,correo',
            ]);
            $user->email = $request->input('email');
          }
    
          // if(!empty($request->file('photo'))){
          //   $filename = time();
          //   $folder = 'public/photo_usuarios';
          //   $user->photo = ImportImage::save($request, 'image', $filename, $folder);
          // }
          if(!empty($request->file('photo'))){
            $request->validate([
              'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $file = $request->file('photo');
            $filename = time() .'.'. $file->getClientOriginalExtension();
            $path = $file->storeAs('public/photo_users',$filename);
            $user->photo= $filename;
          }
    
          $user->update();
          return back()->with('success','Se ha actualizado.')->with('tabs','user');
        } catch (\Throwable $th) {
          return back()->with('info','Error Intente nuevamente.')->with('tabs','user');
          // return $th;
        }
      }

      public function password(PasswordUserRequest $request){
        $user = current_user();
        $actual_password = hash('sha256', $request->input('password_actual'));
        $new_password = hash('sha256', $request->input('password_nueva'));
        if($actual_password==$user->password){
          if($user->password != $new_password){
            $user->password = $new_password;
            $user->update();
    
            return back()->with('success','Se ha actualizado la contraseña.')->with('tabs','password');
          }else{
            return back()->with('info','Error las contraseñas son iguales.')->with('tabs','password');
          }
        }else{
          return back()->with('info','Error intente nuevamente.')->with('tabs','password');
        }
      }
}
