<?php

namespace App\Http\Controllers\Inventary;

use App\Http\Controllers\Controller;
use App\Models\Inventary\ProductType;
use Illuminate\Http\Request;

use App\Http\Requests\ProductTypeRequest;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $types = ProductType::get();
      return view('inventary.productType.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('inventary.productType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductTypeRequest $request)
    {
      $t = new ProductType();
      $t->name = $request->input('name');
      $t->save();

      return Redirect()->route('types.index')->with('success',trans('alert.success'));
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
      $type = ProductType::findOrFail($id);
      return view('inventary.productType.edit', compact('type'));
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
        $t = ProductType::findOrFail($id);
        $t->name = $request->input('name');
        $t->update();
        return Redirect()->route('types.index')->with('success', trans('alert.update'));
      } catch (\Throwable $th) {
        return Redirect()->route('types.index')->with('warning',trans('alert.warning'));
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
      ProductType::where('id',$id)->delete();
      return Redirect()->route('types.index')->with('success', trans('alert.delete'));
    }
}
