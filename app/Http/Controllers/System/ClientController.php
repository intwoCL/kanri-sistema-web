<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\System\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $clients = Client::get();
      return view('system.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('system.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $clie = new Client();
      $clie->rut = $request->input('rut');
      $clie->names = $request->input('names');
      $clie->surnames = $request->input('surnames');
      $clie->email = $request->input('email');
      $clie->phone = $request->input('phone');
      $clie->save();
      return Redirect()->route('client.index')->with('success', trans('alert.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $client = Client::findOrFail($id);
      return view('system.client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $client = Client::findOrFail($id);
      return view('system.client.edit', compact('client'));
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
        $clie = Client::findOrFail($id);
        $clie->rut = $request->input('rut');
        $clie->names = $request->input('names');
        $clie->surnames = $request->input('surnames');
        $clie->email = $request->input('email');
        $clie->phone = $request->input('phone');
        $clie->update();
        return Redirect()->route('client.index')->with('success', trans('alert.success'));
      } catch (\Throwable $th) {
        return Redirect()->route('client.index')->with('warning', trans('alert.warning'));
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
      Client::where('id',$id)->delete();
      return Redirect()->route('client.index')->with('success', trans('alert.delete'));
    }
}
