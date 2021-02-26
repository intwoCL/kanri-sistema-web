<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Inventary\Product;
use App\Models\System\Region;
use Illuminate\Http\Request;
use PhpParser\Node\NullableType;
use PhpParser\Node\Stmt\Foreach_;

class CartController extends Controller
{
  private $name_sesion = "carrito";

  public function index(){
    $products = Product::all();
    $cart = $this->getCart();
    $mis_productos = $cart['products'] ?? null;
    return view('cart.index', compact('products','cart','mis_productos'));
  }

  public function addProduct(Request $request){
    $p = Product::find($request->input('product_id'));
    // $new_price = $request->input('unit_value');
    $cantidad = $request->input('quantity');

    $this->addProducto($p, $cantidad);
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

  public function addProducto(Product $p, $cantidad){
    $cart = $this->getCart();
    $product =[
      'id'       => $p->id,
      'photo'    => $p->presenter()->getPhoto(),
      'code'     => $p->code,
      'name'     => $p->name,
      'price'    => $p->credit_price,
      'quantity' => $cantidad
    ];

    // NOTA: Este metodo tambien deberia ver si no esta duplicado el producto

    $cart['total'] += $p->credit_price * $cantidad;
    array_push($cart['products'],$product);
    $this->save($cart);
  }

  public function deleteCart(){
    session([$this->name_sesion => null]);
    return back()->with('success','Eliminado');
  }

  // sobre escribre el total y devuelve el cart
  public function calculate($cart){
    $total = 0;
    foreach ($cart['products'] as $p) {
      $total += $p['price'] * $p['quantity'];
    }
    $cart['total'] = $total;
    return $cart;
  }

  public function deleteProduct(Request $request){
    $id = $request->input('id');
    $cart = $this->getCart();
    unset($cart['products'][$id]);
    $cart = $this->calculate($cart);
    $this->save($cart);
    return back()->with('success','agregado');
  }

}
