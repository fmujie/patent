<?php

namespace App\Models\Auth;

// use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\User;

class SocialUser extends Authenticatable implements JWTSubject
{
    protected $table = 'social_user';
    protected $guarded = ['id'];

    use Notifiable, HasRoles;

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
     public function getJWTIdentifier()
     {
         return $this->getKey();
     }

     /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getRememberTokenName()
    {
        return 'remember_token';//自定义token字段
    }
}
