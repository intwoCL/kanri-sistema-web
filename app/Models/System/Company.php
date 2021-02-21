<?php

namespace App\Models\System;

use App\Presenters\CompanyPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  use HasFactory;

  protected $table = 'sys_company';

  public function city(){
    return $this->belongsTo(City::class,'city_id');
  }

  public function presenter(){
    return new CompanyPresenter($this);
  }

}
