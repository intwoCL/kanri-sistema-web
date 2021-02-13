<?php

namespace App\Http\Controllers\Budget;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Budget\ProductBudget;
use App\Models\Budget\Budget;
use App\Models\Inventary\Product;

class ProductBudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $budget = Budget::findOrFail($id);
      $products = Product::with('productType')->get();
      // return $products;
      return view('budget.budget.products', compact('budget','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
      $pro = Product::findOrFail($request->input('product_id'));
      $probu = new ProductBudget();
      $probu->budget_id = $id;
      $probu->product_id = $pro->id;
      $probu->unit_value = $request->input('unit_value');
      $probu->quantity = $request->input('quantity');
      $probu->total = $probu->unit_value * $probu->quantity;
      $probu->product_name = $pro->name;
      $probu->save();

      $probu->budget->subtotal += $probu->total;
      $producto_iva = $probu->total + ($probu->total * ($probu->budget->iva / 100));

      $probu->budget->total += $producto_iva;
      $probu->budget->update();

      return back()->with('success', trans('alert.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $product = Product::get();
      $probu = ProductBudget::findOrFail($id);
      return view('budget.budget.show', compact('product','probu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      ProductBudget::where('budget_id',$id)->where('id',$request->input('id'))->delete();
      return back()->with('success', trans('alert.delete'));
    }
}
