<?php

namespace App\Modelos\Auditoria\Orden;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenProducto extends Model
{
    use HasFactory;

    protected $table = 'au_orden_producto';

    public function producto(){
      return $this->belongsTo(Product::class,'id_producto');
    }

    public function usuario(){
      return $this->belongsTo(User::class,'id_usuario');
    }
}
