<?php

namespace App\Presenters;

use App\Models\System\Client;

class ClientPresenter extends Presenter
{
  public function getFullName()
  {
    return "{$this->model->names} {$this->model->surnames}";
  }
}

?>