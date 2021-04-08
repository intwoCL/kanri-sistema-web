<?php

namespace App\Modelos\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Currency;

class ProveedorProducto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates= ['deleted_at'];

    protected $table = 'in_detalle_proveedor_productos';

    public function proveedor(){
      return $this->belongsTo(Proveedor::class,'id_proveedor');
    }

    public function producto(){
      return $this->belongsTo(Producto::class,'id_producto');
    }

    public function getPrice(){
      return (new Currency($this->price))->money();
    }

    // public function getTotal(){
    //   return (new Currency($this->total))->money();
    // }
}
