<?php

namespace App\Models\Budget;

use App\Models\Inventary\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Currency;

class ProductBudget extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $dates= ['deleted_at'];

  protected $table = 'bu_product_budget_detail';

  public function budget()
  {
    return $this->belongsTo(Budget::class,'budget_id')->withTrashed();
  }

  public function product()
  {
    return $this->belongsTo(Product::class,'product_id')->withTrashed();
  }

  public function getTotal(){
    return (new Currency($this->total))->money();
  }

  public function getUnitValue(){
    return (new Currency($this->unit_value))->money();
  }

}
