<?php

namespace App\Http\Controllers\Inventary;

use App\Http\Controllers\Controller;
use App\Models\Inventary\Category;
use Illuminate\Http\Request;

use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::get();
      return view('inventary.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('inventary.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
      $c = new Category();
      $c->name = $request->input('name');
      $c->save();
      // return back()->with('success','Se ha creado');
      return Redirect()->route('category.index')->with('success', trans('alert.success'));
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
      $category = Category::findOrFail($id);
      return view('inventary.category.edit', compact('category'));
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
        $c = Category::findOrFail($id);
        $c->name = $request->input('name');
        $c->update();
        return Redirect()->route('category.index')->with('success', trans('alert.update'));
      } catch (\Throwable $th) {
        return Redirect()->route('category.index')->with('warning', trans('alert.warning'));
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
      Category::where('id',$id)->delete();
      return Redirect()->route('category.index')->with('success', trans('alert.delete'));
    }
}
