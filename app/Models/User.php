<?php

namespace App\Models;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'users';
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function handle(Registered $event)
    {
        if ($event->user instanceof MustVerifyEmail && ! $event->user->hasVerifiedEmail()) {
            $event->user->sendEmailVerificationNotification();
        }
    }
    public function getActive(){
        return   $this -> active == '1' ? __('admin/globale.enable')  :  __('admin/globale.desible') ;
    }

    // public function getLogoAttribute($val)
    // {
    //     if($this->userType=='admin')
    //     return ($val !== null) ? asset('uploads/admins/' . $val) : "";
    //     if($this->userType=='vendor')
    //     return ($val !== null) ? asset('uploads/vendors/' . $val) : "";
    // }
    
    public function logo()
    {
        return ($this->logo !== null) ? asset('uploads/users/' . $this->logo) : "";
    }

}
