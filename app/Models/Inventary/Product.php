<?php

namespace App\Models\Inventary;

use App\Models\Audit\Order\AuditProductOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Presenters\ProductPresenter;
use App\Services\Currency;

class Product extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $dates= ['deleted_at'];

  protected $table = 'in_products';

  public function auditOrder(){
    return $this->belongsTo(AuditProductOrder::class,'product_id')->withTrashed();
  }

  public function category()
  {
    return $this->belongsTo(Category::class,'category_id')->withTrashed();
  }

  public function productType()
  {
    return $this->belongsTo(ProductType::class,'product_type_id');
  }

  public function units()
  {
    return $this->belongsTo(Unit::class,'units_id');
  }

  public function presenter()
  {
    return new ProductPresenter($this);
  }

  public function getImportPrice(){
    return (new Currency($this->import_price))->money();
  }

  public function getCreditPrice(){
    return (new Currency($this->credit_price))->money();
  }

}
