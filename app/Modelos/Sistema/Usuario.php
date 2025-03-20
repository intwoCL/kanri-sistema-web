<?php

namespace App\Modelos\Sistema;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Audit\Order\AuditProductOrder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Presenters\UserPresenter;

class Usuario extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $dates= ['deleted_at'];

    protected $table = 'sis_usuario';

    protected $guard = 'user';

    protected $hidden = [
      'password'
    ];

    public function auditOrder(){
      return $this->belongsTo(AuditProductOrder::class,'id_usuario')->withTrashed();
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

    public function rol()
    {
      return $this->belongsTo(Rol::class,'id_rol');
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
