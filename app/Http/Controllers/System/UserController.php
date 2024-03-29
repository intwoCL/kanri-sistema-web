<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\System\User;
use App\Models\System\Role;
use Illuminate\Http\Request;

use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::get();
      return view ('system.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Role::get();
      return view('system.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
      try {
        $u = new User();
        $u->email = $request->input('email');
        $u->password = hash('sha256', $request->input('password'));       
        $u->first_name = $request->input('first_name');
        $u->last_name = $request->input('last_name');
        $u->rol_id = $request->input('rol_id');
        if(!empty($request->file('photo'))){
          $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
          $file = $request->file('photo');
          $filename = time() .'.'. $file->getClientOriginalExtension();
          $path = $file->storeAs('public/photo_users',$filename);
          $u->photo= $filename;
        }
        $u->save();
        return redirect()->route('user.index')->with('success',trans('alert.success'));
      } catch (\Throwable $th) {
        return redirect()->route('user.index')->with('danger', trans('alert.danger'));
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = User::findOrFail($id);
      return view('system.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::findOrFail($id);     
      $roles = Role::get();
      return view('system.user.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      try {
        $u = User::findOrFail($id);
        $u->email = $request->input('email');
        $u->password = hash('sha256', $request->input('password'));        
        $u->first_name = $request->input('first_name');
        $u->last_name = $request->input('last_name');
        $u->rol_id = $request->input('rol_id');
        if(!empty($request->file('photo'))){
          $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
          $file = $request->file('photo');
          $filename = time() .'.'. $file->getClientOriginalExtension();
          $path = $file->storeAs('public/photo_users',$filename);
          $u->photo= $filename;
        }
        $u->update();
        return redirect()->route('user.index')->with('success',trans('alert.update'));
      } catch (\Throwable $th) {
        return redirect()->route('user.index')->with('danger', trans('alert.danger'));
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      User::where('id',$id)->delete();
      return redirect()->route('user.index')->with('success', trans('alert.delete'));
    }
}
