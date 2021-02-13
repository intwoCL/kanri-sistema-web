<?php

namespace App\Models\PurchaseOrder;

use App\Models\Inventary\Product;
use App\Services\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
  use HasFactory;

  protected $table = 'po_order_details';

  public function product(){
    return $this->belongsTo(Product::class,'product_id');
  }

  public function productProvider(){
    return $this->belongsTo(ProductProvider::class,'product_provider_id');
  }

  public function purchaseOrder(){
    return $this->belongsTo(PurchaseOrder::class,'purchase_order_id');
  }

  public function getTotal(){
    return (new Currency($this->total))->money();
  }

  public function getPrice(){
    return (new Currency($this->price))->money();
  }

  public function getSubtotal(){
    return (new Currency($this->subtotal))->money();
  }
}
