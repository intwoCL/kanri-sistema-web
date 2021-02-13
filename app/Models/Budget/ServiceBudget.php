<?php

namespace App\Models\Budget;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Currency;

class ServiceBudget extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $dates= ['deleted_at'];

  protected $table = 'bu_service_budget_detail';

  public function budget()
  {
    return $this->belongsTo(Budget::class,'budget_id')->withTrashed();
  }

  public function getUniqueValue(){
    return (new Currency($this->unique_value))->money();
  }
}
