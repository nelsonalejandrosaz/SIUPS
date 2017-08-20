<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function rol()
    {
      return $this->belongsToMany(rol::class, 'rol_users');
        // return $this->hasOne('App\rol_user');
    }

    public function escuela()
    {
        return $this->belongsTo('App\Escuela');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'apellido', 'email', 'username', 'password','rol_id' 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
