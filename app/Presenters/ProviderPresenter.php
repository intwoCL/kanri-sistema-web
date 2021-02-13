<?php

namespace App\Presenters;

use App\Models\Inventary\Provider;

class ProviderPresenter extends Presenter
{
  public function getFullName()
  {
    return "{$this->model->names} {$this->model->surnames}";
  }
}

?>