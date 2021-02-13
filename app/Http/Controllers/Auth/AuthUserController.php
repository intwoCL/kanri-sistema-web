<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System\User;

use Auth;

class AuthUserController extends Controller
{

  public function home()
  {
    return view('home');
  }

  public function index()
  {
    $this->close_sessions();
    return view('auth.index');
  }

  public function login(Request $request)
  {
    try {
      $u = User::where('email',$request->email)->firstOrFail();
      $pass = hash('sha256',$request->password);
      // return $pass;
      if($u->password==$pass){
        Auth::guard('user')->loginUsingId($u->id);
        return redirect()->route('home');
      }else{
        return $u;
      }
    } catch (\Throwable $th) {
      return $th;
      // return back()->with('info','Error. Intente nuevamente.');
    }
  }

  public function signOut(){
    $this->close_sessions();
    return redirect('/');
  }

  // public function reset(){
  //   return view('layouts.reset');
  //   }


  private function close_sessions(){
    if(\Auth::guard('user')->check()){
      \Auth::guard('user')->logout();
    }
  }

  // public function resetPassword(ResetPasswordRequest $request){
  //   try {
  //     $u = User::where('email',$request->email)->firstOrFail();
  //     $password = $u->changePassword();
  //     $mail = new ResetPasswordMail($password[0]);
  //     Mail::to($u->email)->queue($mail);
  //     return back()->with('success','Se ha enviado un correo.');
  //   } catch (\Throwable $th) {
  //     return back()->with('danger','Error intente nuevamente.');
  //   }
  // }

}
