<?php

namespace App\Models\Audit\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditProductOrder extends Model
{
  use HasFactory;

  protected $table = 'au_order_product_order';

  public function product(){
    return $this->belongsTo(Product::class,'product_id');
  }

  public function user(){
    return $this->belongsTo(User::class,'user_id');
  }
}
