<?php

namespace App\Services;

class ConvertDatetime
{
  protected $date;

  public function __construct(string $date){
    $this->date = $date;
  }

  public function getDatetime(){
    return $this->format($this->date,'d-m-Y H:i');
  }

  public function getDate(){
    return $this->format($this->date,'d-m-Y');
  }

  public function getTime(){
    return $this->format($this->date,'H:i');
  }

  // PRIVATE
  private function format($date, string $format){
    return date_format(date_create($date),$format);
  }
}
