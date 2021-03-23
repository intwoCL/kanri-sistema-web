<?php

namespace App\Http\Controllers\PurchaseOrder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder\OrderDetail;
use App\Models\Inventary\ProductProvider;
use App\Models\PurchaseOrder\PurchaseOrder;
use App\Models\System\Provider;

class OrderDetailController extends Controller
{
  public function create($provider_id, $puchase_order_id){
    $provider = Provider::findOrFail($provider_id);
    $order = PurchaseOrder::findOrFail($puchase_order_id);

    return view('order.order', compact('provider', 'order'));
  }

  public function store(Request $request, $provider_id, $puchase_order_id){
    try {

      $order = PurchaseOrder::findOrFail($puchase_order_id);
      $productoProvider = ProductProvider::findOrFail($request->input('product_id'));

      $orderDetail = new OrderDetail();
      $orderDetail->product_id          = $productoProvider->product_id;
      $orderDetail->product_provider_id = $productoProvider->id;
      $orderDetail->purchase_id         = $puchase_order_id;
      $orderDetail->quantity            = $request->input('quantity');
      $orderDetail->amount_received     = 0;
      $orderDetail->price               = $request->input('price');
      $orderDetail->total               = $orderDetail->price *  $orderDetail->quantity;
      $orderDetail->save();

      $order->subtotal += $orderDetail->total; // no aplica iva
      $order->total += $orderDetail->total + (  $orderDetail->total * ($order->iva/100) ); 
      // total = total + (subtotal + (subtotal * 0.19))
      $order->update();

      return back()->with('success',trans('alert.success'));
    } catch (\Throwable $th) {
      //throw $th;
      return $th;
    }
  }

  public function destroy($id)
  {
    OrderDetail::where('id',$id)->delete();
    return back()->with('success', trans('alert.delete'));
  }
}
