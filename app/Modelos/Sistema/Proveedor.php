<?php

namespace App\Modelos\Sistema;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Presenters\ProviderPresenter;
use App\Modelos\Inventario\ProveedorProducto;
use App\Modelos\OrdenCompra\OrdenCompra;

class Proveedor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates= ['deleted_at'];

    protected $table = 'sis_proveedor';

    public function detailsProduct(){
      return $this->hasMany(ProveedorProducto::class,'id_proveedor');
    }

    public function detailsOrder(){
      return $this->hasMany(OrdenCompra::class,'id_proveedor');
    }

    public function presenter(){
      return new ProviderPresenter($this);
    }


}
