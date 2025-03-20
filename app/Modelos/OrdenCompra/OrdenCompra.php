<?php

namespace App\Modelos\OrdenCompra;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Presenters\PurchaseOrderPresenter;
use App\Modelos\Sistema\Proveedor;
use App\Modelos\Sistema\Usuario;
use App\Modelos\OrdenCompra\DetalleOrden;
use App\Services\ConvertDatetime;
use App\Services\Currency;

class OrdenCompra extends Model
{
    use HasFactory;

    CONST STATE = [
      0 => 'ELIMINADO',
      1 => 'PENDIENTE',
      2 => 'ENVIADO',
      3 => 'APROBADO',
      4 => 'CANCELADO',
    ];

    protected $table = 'oc_orden_compra';

    public function proveedor(){
      return $this->belongsTo(Proveedor::class,'id_proveedor');
    }

    public function usuario(){
      return $this->belongsTo(Usuario::class,'id_usuario');
    }

    public function detalleOrden(){
      return $this->hasMany(DetalleOrden::class,'purchase_id');
    }

    public function presenter(){
      return new PurchaseOrderPresenter($this);
    }

    public function getDateIn(){
      return new ConvertDatetime($this->fecha_emision);
    }

    public function getDateOut(){
      return new ConvertDatetime($this->fecha_entrega);
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
