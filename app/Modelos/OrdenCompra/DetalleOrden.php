<?php

namespace App\Modelos\OrdenCompra;

use App\Modelos\Inventario\Producto;
use App\Services\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model
{
    use HasFactory;

    protected $table = 'oc_detalle_orden';

    public function producto(){
      return $this->belongsTo(Producto::class,'id_producto');
    }

    public function proveedorProducto(){
      return $this->belongsTo(ProveedorProducto::class,'id_proveedor_producto');
    }

    public function ordenCompra(){
      return $this->belongsTo(OrdenCompra::class,'id_orden_compra');
    }

    public function getTotal(){
      return (new Currency($this->total))->money();
    }

    public function getPrecio(){
      return (new Currency($this->pricio))->money();
    }

    public function getSubtotal(){
      return (new Currency($this->subtotal))->money();
    }
}
