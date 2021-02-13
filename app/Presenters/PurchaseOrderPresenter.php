<?php

namespace App\Presenters;

use App\Models\PurchaseOrder\PurchaseOrder;

class PurchaseOrderPresenter extends Presenter
{
  public function getFullName(){
    return "{$this->model->names} {$this->model->surnames}";
  }

  public function status(){
    return PurchaseOrder::STATE[$this->model->status];
  }
}

?>