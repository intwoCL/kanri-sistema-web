<?php

namespace App\Models\Budget;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\System\User;
use App\Models\System\Client;
use App\Presenters\BudgetPresenter;
use App\Services\ConvertDatetime;
use App\Services\Currency;

class Budget extends Model
{
  use HasFactory;
  use SoftDeletes;

  CONST STATE = [
    1 => 'PENDIENTE',
    2 => 'APROBADO',
    3 => 'RECHAZADO',
  ];

  protected $dates= ['deleted_at'];

  protected $table = 'bu_budgets';

  public function user()
  {
    return $this->belongsTo(User::class,'user_id')->withTrashed();
  }

  public function client()
  {
    return $this->belongsTo(Client::class,'client_id')->withTrashed();
  }

  public function detailsProduct(){
    return $this->hasMany(ProductBudget::class,'budget_id');
  }

  public function detailsService(){
    return $this->hasMany(ServiceBudget::class,'budget_id');
  }

  public function presenter()
  {
    return new BudgetPresenter($this);
  }

  public function getTotal(){
    return (new Currency($this->total))->money();
  }

  public function getDateIn(){
    return new ConvertDatetime($this->start_date);
  }

  public function getDateOut(){
    return new ConvertDatetime($this->finish_date);
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
