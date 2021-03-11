<?php

namespace App\Presenters;

use App\Models\Invoice\InvoiceBill;

class InvoicePresenter extends Presenter
{
  public function status()
  {
    return InvoiceBill::STATE[$this->model->status];
  }

}

?>