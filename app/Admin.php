<?php
    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use App\Notifications\AdminResetPasswordNotification;

use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use Notifiable;
    // The authentication guard for admin
        protected $guard = 'admin';
         /**
          * The attributes that are mass assignable.
          *
          * @var array
          */
        protected $fillable = [
            'email', 'password',
        ];
         /**
          * The attributes that should be hidden for arrays.
          *
          * @var array
          */
        protected $hidden = [
            'password', 'remember_token',
        ];

        public function sendPasswordResetNotification($token)
        {
            $this->notify(new AdminResetPasswordNotification($token));
        }
}
