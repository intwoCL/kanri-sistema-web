<?php

namespace App\Modelos\Sistema;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $table = 'sis_ciudad';
    public $timestamps = false;

    public function region(){
      return $this->belongsTo(Region::class,'id_region');
    }
}
