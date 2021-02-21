<?php

namespace App\Presenters;

use App\Services\Imagen;
use Illuminate\Support\Facades\Storage;

class CompanyPresenter extends Presenter
{
  private $folderImg = 'photo_company';
  private $photoDefault = '/dist/image/portada.jpg';
  private $logoDefault = '/dist/image/icono.svg';

  public function getPhoto(){
    return (new Imagen($this->model->photo, $this->folderImg, $this->photoDefault))->call();
  }

  public function getLogo(){
    return (new Imagen($this->model->logo, $this->folderImg, $this->logoDefault))->call();
  }
}

?>