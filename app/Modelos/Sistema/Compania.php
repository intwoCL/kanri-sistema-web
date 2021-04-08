<?php

namespace App\Modelos\Sistema;

use App\Presenters\CompanyPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
    use HasFactory;

    protected $table = 'sis_compania';

    public function ciudad(){
      return $this->belongsTo(Ciudad::class,'id_ciudad');
    }

    public function presenter(){
      return new CompanyPresenter($this);
    }
}
