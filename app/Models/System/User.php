<?php

namespace App\Models\System;

use App\Models\Audit\Order\AuditProductOrder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Presenters\UserPresenter;

class User extends Authenticatable
{
  use Notifiable;
  use HasFactory;
  use SoftDeletes;

  protected $dates= ['deleted_at'];

  protected $table = 'sys_users';

  protected $guard = 'user';

  protected $hidden = [
    'password'
  ];

  public function auditOrder(){
    return $this->belongsTo(AuditProductOrder::class,'user_id')->withTrashed();
  }

  public function changePassword($newPassword = ''){
    if(empty($newPassword)){
      $newPassword = helper_random_integer(6);
    }
    $encryPassword = hash('sha256', $newPassword);
    $this->password = $encryPassword;
    $this->update();
    return [$newPassword,$encryPassword];
  }

  public function role()
  {
    return $this->belongsTo(Role::class,'rol_id');
  }

  public function presenter()
  {
    return new UserPresenter($this);
  }

  public function authorizeRoles($roles)
  {
      abort_unless($this->hasAnyRole($roles), 401);
      return true;
  }

  public function hasAnyRole($roles)
  {
      if (is_array($roles)) {
          foreach ($roles as $role) {
              if ($this->hasRole($role)) {
                  return true;
              }
          }
      } else {
          if ($this->hasRole($roles)) {
              return true;
          }
      }
      return false;
  }

  public function hasRole($role)
  {
      if ($this->roles()->where('name', $role)->first()) {
          return true;
      }
      return false;
  }

  public function company(){
    return session()->get('company');
  }

}
