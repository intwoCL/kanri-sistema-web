<?php

namespace App\Http\Controllers\Inventary;

use App\Http\Controllers\Controller;
use App\Models\Inventary\Unit;
use Illuminate\Http\Request;

use App\Http\Requests\UnitRequest;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $units = Unit::get();
      return view('inventary.unit.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('inventary.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitRequest $request)
    {
      $u = new Unit();
      $u->name = $request->input('name');
      $u->save();
      return Redirect()->route('unit.index')->with('success', trans('alert.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $unit = Unit::findOrFail($id);
      return view('inventary.unit.edit', compact('unit'));
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
        $u = Unit::findOrFail($id);
        $u->name = $request->input('name');
        $u->update();
        return Redirect()->route('unit.index')->with('success', trans('alert.update'));
      } catch (\Throwable $th) {
        return Redirect()->route('unit.index')->with('warning', trans('alert.warning'));
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
      Unit::where('id',$id)->delete();
      return Redirect()->route('unit.index')->with('success', trans('alert.delete'));
    }
}
