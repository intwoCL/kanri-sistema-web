<?php

namespace App\Http\Controllers\PurchaseOrder;

use App\Http\Controllers\Controller;
use App\Models\Inventary\Product;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder\PurchaseOrder;
use App\Models\Audit\Order\AuditProductOrder;
use App\Models\PurchaseOrder\OrderDetail;
use App\Models\System\Provider;
use App\Models\System\User;
use App\Models\Inventary\ProductProvider;
use App\Services\Config;
use Laravel\Ui\Presets\React;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $provider = Provider::findOrFail($id);
      $status = PurchaseOrder::STATE;
      return view('order.create', compact('status','provider'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
      $order = new PurchaseOrder();
      $order->order_code = $this->findCode();
      $order->user_id = current_user()->id;
      $order->provider_id = $id;
      $order->issue_date = $request->input('issue_date');
      $order->comment = $request->input('comment');
      $order->iva = Config::IVA();
      $order->save();
      return redirect()->route('provider.order',$id)->with('success', trans('alert.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($provider_id, $purchase_order_id)
    {
      $provider = Provider::findOrFail($provider_id);
      $order = PurchaseOrder::findOrFail($purchase_order_id);
      return view('order.show',compact('provider','order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($provider_id, $purchase_order_id)
    {
      // return $request;
      try {
        $provider = Provider::findOrFail($provider_id);
        $order = PurchaseOrder::findOrFail($purchase_order_id);
        $status = PurchaseOrder::STATE;
        return view('order.edit',compact('provider','order','status'));
      } catch (\Throwable $th) {
        //throw $th;
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $purchase_order_id)
    {
      // return $request;
      try {
        $order = PurchaseOrder::findOrFail($purchase_order_id);
        // $product = Product::findOrFail($product_id);
        $details = OrderDetail::findOrFail($id);
        $audit = new AuditProductOrder();

        //orden de compra
        $order->delivery_date = $request->input('delivery_date');
        $order->status = $request->input('status');
        
        //producto
        $details->product->available_stock += $audit->new_quantity;
        
        //auditoria
        $audit->product_id = $details->product_id;
        $audit->user_id    = current_user()->id;
        $audit->old_quantity = $details->product->available_stock;
        $audit->new_quantity  = $request->input('new_quantity');
        $audit->current_price = $details->total;
        $audit->import_price = $details->product->import_price;
        $audit->current_date = $request->input('delivery_date');
        $audit->total_quantity = $audit->old_quantity + $audit->new_quantity;

        $order->update();
        $details->save();
        $audit->save();
        

        return redirect()->route('provider.order',$id)->with('success',trans('alert.success'));
      } catch (\Throwable $th) {
        return $th;
        // return back()->with('danger',trans('alert.danger'));
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
      PurchaseOrder::where('id',$id)->delete();
      return back()->with('success', trans('alert.delete'));
    }

    private function findCode() {
      try {
        $code = helper_random_string_number(12);
        PurchaseOrder::where('order_code',$code)->firstOrFail();
        return $this->findCode();
      } catch (\Throwable $th) {
        //throw $th;
        return $code;
      }
    }

    public function print($id){
      $provider = Provider::findOrFail($id);
      $pdf = \PDF::loadview('pdf.purchase', compact('provider'));
      return $pdf->download('orderCompra.pdf');
    }

    public function preview($provider_id, $purchase_order_id){
      $provider = Provider::findOrFail($provider_id);
      $order = PurchaseOrder::findOrFail($purchase_order_id);
      $pdf = \PDF::loadview('pdf.purchase', compact('provider','order'));
      return $pdf->stream('orderCompra.pdf');
    }

    public function recalculated(Request $request, $provider_id, $purchase_order_id)
    {
      // return $request;
      try {
        $order = PurchaseOrder::findOrFail($purchase_order_id);
        if ($order->recalculated()) {
          return back()->with('success', 'Hemos recalculado correctamente');
        }
      } catch (\Throwable $th) {
        //throw $th;
        return back()->with('danger','Error intente nuevamente.');
        // return $th;
      }
    }
}
