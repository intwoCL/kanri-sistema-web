<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\System\Provider;
use App\Models\Inventary\Product;
use App\Models\Inventary\ProductProvider;
use Illuminate\Http\Request;

use App\Http\Requests\ProviderRequest;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $providers = Provider::get();
      return view('system.provider.index',compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('system.provider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderRequest $request)
    {
      $prov = new Provider();
      $prov->rut = $request->input('rut');
      $prov->names = $request->input('names');
      $prov->surnames = $request->input('surnames');
      $prov->address = $request->input('address');
      $prov->email = $request->input('email');
      $prov->phone = $request->input('phone');
      $prov->save();
      return Redirect()->route('provider.index')->with('success', trans('alert.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $provider = Provider::findOrFail($id);
      return view('system.provider.show', compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $provider = Provider::findOrFail($id);
      return view('system.provider.edit', compact('provider'));
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
        $prov = Provider::findOrFail($id);
        $prov->rut = $request->input('rut');
        $prov->names = $request->input('names');
        $prov->surnames = $request->input('surnames');
        $prov->address = $request->input('address');
        $prov->email = $request->input('email');
        $prov->phone = $request->input('phone');
        $prov->update();
        return back()->with('success',trans('alert.update'));
      } catch (\Throwable $th) {
        return back()->with('warning',trans('alert.warning'));
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
      Provider::where('id',$id)->delete();
      return back()->with('success', trans('alert.delete'));
    }

    public function products($id)
    {
      $provider = Provider::findOrFail($id);
      // return $provider->detailsProduct->pluck('product_id');
      $products = Product::with('productType')->whereNotIn('id', $provider->detailsProduct->pluck('product_id'))->get();
      return view('system.provider.products', compact('provider','products'));
    }

    public function productStore(Request $request, $id)
    {
      $proprov = new ProductProvider();
      $proprov->provider_id = $id;
      $proprov->product_id = $request->input('product_id');
      $proprov->price = $request->input('unit_value');
      $proprov->quantity = $request->input('quantity');
      $proprov->total = $proprov->price * $proprov->quantity;
      $proprov->save();
      return back()->with('success', trans('alert.success'));
      // return $request;
    }

    public function order($id)
    {
      $provider = Provider::findOrFail($id);
      return view('order.index', compact('provider'));
    }

    public function destroyProduct(Request $request, $id)
    {
      ProductProvider::where('provider_id',$id)->where('id',$request->input('id'))->delete();
      return back()->with('success', trans('alert.delete'));
    }
}
