<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Presenters\ProviderPresenter;
use App\Models\Inventary\ProductProvider;
use App\Models\PurchaseOrder\PurchaseOrder;

class Provider extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $dates= ['deleted_at'];

  protected $table = 'sys_provider';

  public function detailsProduct(){
    return $this->hasMany(ProductProvider::class,'provider_id');
  }
  
  public function detailsOrder(){
    return $this->hasMany(PurchaseOrder::class,'provider_id');
  }

  public function presenter(){
    return new ProviderPresenter($this);
  }

}
