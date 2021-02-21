<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
  use HasFactory;

  protected $table = 'sys_regions';
  public $timestamps = false;

}
