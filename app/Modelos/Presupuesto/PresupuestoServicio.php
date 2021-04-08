<?php

namespace App\Modelos\Presupuesto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Currency;

class PresupuestoServicio extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates= ['deleted_at'];

    protected $table = 'pr_presupuesto_servicio';

    public function presupuesto()
    {
      return $this->belongsTo(Presupuesto::class,'id_presupuesto')->withTrashed();
    }

    public function getValorUnico(){
      return (new Currency($this->valor_unico))->money();
    }
}
