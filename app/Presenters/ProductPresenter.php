<?php

namespace App\Presenters;
use Illuminate\Support\Facades\Storage;

use App\Models\Inventary\Product;

class ProductPresenter extends Presenter
{
  private $folderImg = 'photo_products';
  private $imgDefault = '/dist/image/no-imagen-48.jpg';

  public function getPhoto()
  {
    try {
      if($this->model->photo == null){
        return $this->imgDefault;
      }
      return Storage::url("{$this->folderImg}/{$this->model->photo}");
    } catch (\Throwable $th) {
      return $this->imgDefault;
    }
  }
}


?>