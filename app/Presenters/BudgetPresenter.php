<?php

namespace App\Presenters;

use App\Models\Budget\Budget;

class BudgetPresenter extends Presenter
{
  public function status()
  {
    return Budget::STATE[$this->model->status];
  }

}

?>