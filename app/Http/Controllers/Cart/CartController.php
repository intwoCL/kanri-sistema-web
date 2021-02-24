<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Inventary\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
  private $name_sesion = "carrito";

  public function index(){
    $products = Product::all();
    $cart = $this->getCart();
    // $productosMIOS = $this->getProducts(); o
    $mis_productos = $cart['products'];


    // return $cart;
    // return $cart['product'];
    return view('cart.index', compact('products','cart','mis_productos'));
  }

  public function addProduct(Request $request){
    $p = Product::find($request->input('product_id'));
    $this->addProducto($p);
    return back()->with('success','agregado');
  }

  // Crea la sesion de carrito y si no esta
  private function getCart(){
    if (session()->has($this->name_sesion)) {
      return session()->get($this->name_sesion);
    }
    $this->handle();
    return $this->getCart();
  }


  private function handle(){
    $cart = array(
      'user_id' => current_user()->id,
      'products' => [],
      'total' => 0
    );

    return $this->save($cart);
  }

  private function save($cart){
    session([$this->name_sesion => $cart]);
  }

  private function getProducts(){
    return $this->getCart()['products'];
  }

  public function addProducto(Product $p){
    $cart = $this->getCart();
    array_push($cart['products'],$p);
    $this->save($cart);
  }

  public function deleteCart(){
    session([$this->name_sesion => null]);
    return back()->with('success','Eliminado');
  }

}
