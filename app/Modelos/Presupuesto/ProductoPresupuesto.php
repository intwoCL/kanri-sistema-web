<?php

namespace App\Modelos\Presupuesto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Currency;

class ProductoPresupuesto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates= ['deleted_at'];

    protected $table = 'pr_producto_presupuesto';

    public function presupueto()
    {
      return $this->belongsTo(Presupuesto::class,'id_presupuesto')->withTrashed();
    }

    public function producto()
    {
      return $this->belongsTo(Producto::class,'id_producto')->withTrashed();
    }

    public function getTotal(){
      return (new Currency($this->total))->money();
    }

    public function getValorUnico(){
      return (new Currency($this->valor_unico))->money();
    }
}
