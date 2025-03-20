<?php

namespace App\Modelos\Presupuesto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Modelos\Sistema\Usuario;
use App\Modelos\Sistema\Cliente;
use App\Presenters\BudgetPresenter;
use App\Services\ConvertDatetime;
use App\Services\Currency;

class Presupuesto extends Model
{
    use HasFactory;
    use SoftDeletes;

    CONST STATE = [
      1 => 'PENDIENTE',
      2 => 'APROBADO',
      3 => 'RECHAZADO',
    ];

    protected $dates= ['deleted_at'];

    protected $table = 'pr_presupuesto';

    public function usuario()
    {
      return $this->belongsTo(Usuario::class,'id_usuario')->withTrashed();
    }

    public function cliente()
    {
      return $this->belongsTo(Cliente::class,'id_cliente')->withTrashed();
    }

    public function productoDetalle(){
      return $this->hasMany(PresupuestoProducto::class,'id_presupuesto');
    }

    public function servicioDetalle(){
      return $this->hasMany(PresupuestoServicio::class,'id_presupuesto');
    }

    public function presenter()
    {
      return new BudgetPresenter($this);
    }

    public function getTotal(){
      return (new Currency($this->total))->money();
    }

    public function getDateIn(){
      return new ConvertDatetime($this->fecha_inicio);
    }

    public function getDateOut(){
      return new ConvertDatetime($this->fecha_termino);
    }

    public function getSubtotal(){
      return (new Currency($this->subtotal))->money();
    }

    public function recalculated(){
      $subtotal = 0;

      $detailsService = $this->detailsService;

      foreach ($detailsService as $ds) {
        $subtotal += $ds->unique_value;
      }

      $detailsProduct = $this->detailsProduct;

      foreach ($detailsProduct as $dp) {
        $dp->total = $dp->unit_value * $dp->quantity;
        $dp->update();
        $subtotal += $dp->total;
      }

      $this->subtotal = $subtotal;
      $this->total = $subtotal + ($subtotal * ($this->iva/100));
      $this->update();

      return true;
    }

}
