<?php

namespace App\Modelos\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Presenters\ProductPresenter;
use App\Services\Currency;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates= ['deleted_at'];

    protected $table = 'in_producto';

    public function ordenProdcuto(){
      return $this->belongsTo(OrdenProducto::class,'id_producto')->withTrashed();
    }

    public function categoria()
    {
      return $this->belongsTo(Categoria::class,'id_categoria')->withTrashed();
    }

    public function TipoProducto()
    {
      return $this->belongsTo(TipoProducto::class,'id_tipo_producto');
    }

    public function unidad()
    {
      return $this->belongsTo(Unidad::class,'id_unidad');
    }

    public function presenter()
    {
      return new ProductPresenter($this);
    }

    public function getImportPrice(){
      return (new Currency($this->costo_importacion))->money();
    }

    public function getCreditPrice(){
      return (new Currency($this->precio_credito))->money();
    }


}
