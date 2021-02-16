<?php

namespace App\Services;

class Config
{
  public static function IVA(){
    return env('APP_IVA', '19');
  }
}
