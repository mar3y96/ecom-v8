<?php

namespace App;

use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_name', 'l_name', 'email', 'password', 'city_id', 'gender'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password']=Hash::make($password);
    }
    
    public function orders()
    {
        return $this->hasMany('App\Model\Site\Order', 'user_id', 'id');
    }
    
    public function products()
    {
        return $this->belongsToMany('App\Model\Admin\Product', 'product_user', 'user_id', 'product_id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
