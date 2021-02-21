<?php

namespace App\Presenters;

use App\Services\Imagen;
use Illuminate\Support\Facades\Storage;

class UserPresenter extends Presenter
{
  private $folderImg = 'photo_users';
  private $imgDefault = '/image/avatar.png';

  public function getPhoto(){
    return (new Imagen($this->model->photo, $this->folderImg, $this->imgDefault))->call();
  }


  public function getFullName(){
    return "{$this->model->first_name} {$this->model->last_name}";
  }

}

?>