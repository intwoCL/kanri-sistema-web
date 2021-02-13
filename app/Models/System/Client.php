<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Presenters\ClientPresenter;

class Client extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $dates= ['deleted_at'];

  protected $table = 'sys_clients';

  public function presenter()
  {
    return new ClientPresenter($this);
  }
  
}
