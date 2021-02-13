<?php

namespace App\Presenters;
use Illuminate\Support\Facades\Storage;

class UserPresenter extends Presenter
{
  private $folderImg = 'photo_users';
  private $imgDefault = '/image/avatar.png';

  public function getPhoto()
  {
    try {
      if($this->model->photo == $this->imgDefault){
        return $this->imgDefault;
      }
      return Storage::url("{$this->folderImg}/{$this->model->photo}");
    } catch (\Throwable $th) {
      return $this->imgDefault;
    }
  }

  public function getFullName(){
    return "{$this->model->first_name} {$this->model->last_name}";
  }

}

?>