<?php

namespace App\Modelos\Factura;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modelos\Sistema\Usuario;
use App\Modelos\Sistema\Cliente;
use App\Modelos\Inventario\Producto;
use App\Modelos\Sistema\Compania;
use App\Presenters\InvoicePresenter;
use App\Services\ConvertDatetime;
use App\Services\Currency;

class Factura extends Model
{
    use HasFactory;

    CONST STATE = [
      0 => 'FACTURA',
      1 => 'BOLETA',
      2 => 'FACTURA ELECTRONICA',
      3 => 'BOLETA ELECTRONICA',
    ];

    protected $table = 'fa_factura';

    public function usuario()
    {
      return $this->belongsTo(Usuario::class,'id_usuario');
    }

    public function compania()
    {
      return $this->belongsTo(Compania::class,'id_compania');
    }

    public function cliente()
    {
      return $this->belongsTo(Cliente::class,'id_cliente');
    }

    public function producto()
    {
      return $this->belongsTo(Producto::class,'id_producto');
    }

    public function getDateIn(){
      return new ConvertDatetime($this->fecha_emision);
    }

    public function getPrice(){
      return (new Currency($this->precio))->money();
    }

    public function getSubtotal(){
      return (new Currency($this->subtotal))->money();
    }

    public function getTotal(){
      return (new Currency($this->total))->money();
    }

    public function presenter()
    {
      return new InvoicePresenter($this);
    }
}
