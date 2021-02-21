<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  use HasFactory;

  protected $table = 'sys_cities';
  public $timestamps = false;

  public function region(){
    return $this->belongsTo(Region::class,'region_id');
  }
}
