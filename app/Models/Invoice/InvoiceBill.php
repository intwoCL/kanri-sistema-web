<?php

namespace App\Models\Invoice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\System\User;
use App\Models\System\Client;
use App\Models\Inventary\Product;
use App\Services\ConvertDatetime;
use App\Services\Currency;

class InvoiceBill extends Model
{
    use HasFactory;

    CONST STATE = [
      0 => 'FACTURA',
      1 => 'BOLETA',
      2 => 'FACTURA ELECTRONICA',
      3 => 'BOLETA ELECTRONICA',
    ];
    
    protected $table = 'bi_invoice_bill';

    public function user()
    {
      return $this->belongsTo(User::class,'user_id');
    }
  
    public function client()
    {
      return $this->belongsTo(Client::class,'client_id');
    }

    public function product()
    {
      return $this->belongsTo(Product::class,'product_id');
    }

    public function getDateIn(){
      return new ConvertDatetime($this->issue_date);
    }

    public function getPrice(){
      return (new Currency($this->price))->money();
    }
  
    public function getSubtotal(){
      return (new Currency($this->subtotal))->money();
    }

    public function getTotal(){
      return (new Currency($this->total))->money();
    }

}
