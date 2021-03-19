<?php

namespace App\Http\Controllers\Inventary;

use App\Http\Controllers\Controller;
use App\Models\Inventary\Category;
use App\Models\Inventary\Product;
use App\Models\Inventary\ProductType;
use App\Models\Inventary\Unit;
use Illuminate\Http\Request;

use App\Http\Requests\ProductRequest;
use App\Services\ImportImage;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $products = Product::with(['category','productType','units'])->get();
    // return $products;
    return view('inventary.product.index',compact('products'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(){
    $categories = Category::get();
    $units = Unit::get();
    $types = ProductType::get();
    return view('inventary.product.create',compact('categories','units','types'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ProductRequest $request)
  {
    $prod = new Product();
    $prod->code = $request->input('code');
    $prod->name = $request->input('name');
    $prod->description = $request->input('description');
    $prod->import_price = $request->input('import_price');
    $prod->credit_price = $request->input('credit_price');
    $prod->category_id = $request->input('category_id');
    $prod->product_type_id = $request->input('product_type_id');
    $prod->units_id = $request->input('units_id');
    $prod->available_stock= $request->input('available_stock');
    $prod->critical_stock = $request->input('critical_stock');

    if(!empty($request->file('photo'))){
      $filename = time();
      $folder = 'public/photo_products';
      $prod->photo = ImportImage::save($request, 'photo', $filename, $folder);
    }

    $prod->save();
    return Redirect()->route('product.index')->with('success', trans('alert.success'));

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $product = Product::findOrFail($id);
    return view('inventary.product.show', compact('product'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $product = Product::findOrFail($id);
    $categories = Category::get();
    $units = Unit::get();
    $types = ProductType::get();
    return view('inventary.product.edit', compact('product','categories','units','types'));
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
      $prod = Product::findOrFail($id);
      $prod->code = $request->input('code');
      $prod->name = $request->input('name');
      $prod->description = $request->input('description');
      $prod->import_price = $request->input('import_price');
      $prod->credit_price = $request->input('credit_price');
      $prod->category_id = $request->input('category_id');
      $prod->product_type_id = $request->input('product_type_id');
      $prod->units_id = $request->input('units_id');
      $prod->available_stock= $request->input('available_stock');
      $prod->critical_stock = $request->input('critical_stock');
      if(!empty($request->file('photo'))){
        $request->validate([
          'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $file = $request->file('photo');
        $filename = time() .'.'. $file->getClientOriginalExtension();
        $path = $file->storeAs('public/photo_products',$filename);
        $prod->photo= $filename;
      }
      $prod->update();
      return Redirect()->route('product.index')->with('success',trans('alert.update'));
    } catch (\Throwable $th) {
      return Redirect()->route('product.index')->with('warning',trans('alert.warning'));
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
    Product::where('id',$id)->delete();
    return Redirect()->route('product.index')->with('success', trans('alert.delete'));
  }
}
