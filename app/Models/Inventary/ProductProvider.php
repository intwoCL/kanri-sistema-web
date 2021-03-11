<?php

namespace App\Models\Inventary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Currency;

class ProductProvider extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $dates= ['deleted_at'];

  protected $table = 'in_products_supplier_detail';

  public function provider(){
    return $this->belongsTo(Provider::class,'provider_id');
  }

  public function product(){
    return $this->belongsTo(Product::class,'product_id');
  }

  public function getPrice(){
    return (new Currency($this->price))->money();
  }

  // public function getTotal(){
  //   return (new Currency($this->total))->money();
  // }
}
