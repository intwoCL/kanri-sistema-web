<?php

namespace App\Modelos\Sistema;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Presenters\ClientPresenter;

class Cliente extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates= ['deleted_at'];

    protected $table = 'sis_cliente';

    public function presenter()
    {
      return new ClientPresenter($this);
    }
}
