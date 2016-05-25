<?php

namespace Eoola;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'no_induk', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function student()
    {
        return $this->hasOne('Eoola\Student', 'user_id', 'id');
    }

    public function teacher()
    {
        return $this->hasOne('Eoola\Teacher', 'user_id', 'id');
    }

    public function tests()
    {
        return $this->hasMany('Eoola\Test', 'user_id', 'id');
    }

    public function answers()
    {
        return $this->hasMany('Eoola\Answer', 'user_id','id');
    }

    public function results()
    {
        return $this->hasMany('Eoola\Result', 'user_id','id');
    }
}
