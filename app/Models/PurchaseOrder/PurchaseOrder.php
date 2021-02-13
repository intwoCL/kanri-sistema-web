<?php

namespace App\Models\PurchaseOrder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Presenters\PurchaseOrderPresenter;
use App\Models\System\Provider;
use App\Models\System\User;
use App\Models\PurchaseOrder\OrderDetail;
use App\Services\ConvertDatetime;
use App\Services\Currency;

class PurchaseOrder extends Model
{
  use HasFactory;

  CONST STATE = [
    0 => 'ELIMINADO',
    1 => 'PENDIENTE',
    2 => 'ENVIADO',
    3 => 'APROBADO',
    4 => 'CANCELADO',
  ];

  protected $table = 'po_purchase_order';

  public function provider(){
    return $this->belongsTo(Provider::class,'provider_id');
  }

  public function user(){
    return $this->belongsTo(User::class,'user_id');
  }

  public function detailsOrder(){
    return $this->hasMany(OrderDetail::class,'purchase_id');
  }

  public function presenter(){
    return new PurchaseOrderPresenter($this);
  }

  public function getDateIn(){
    return new ConvertDatetime($this->issue_date);
  }

  public function getDateOut(){
    return new ConvertDatetime($this->delivery_date);
  }

  public function getTotal(){
    return (new Currency($this->total))->money();
  }

  public function getSubtotal(){
    return (new Currency($this->subtotal))->money();
  }
  
  public function recalculated(){
    $subtotal = 0;

    $detailsOrder = $this->detailsOrder;

    foreach ($detailsOrder as $do) {
      $do->total = $do->price * $do->quantity;
      $do->update();
      $subtotal += $do->total;
    }

    $this->subtotal = $subtotal;
    $this->total = $subtotal + ($subtotal * ($this->iva/100));
    $this->update();

    return true;
  }

}
