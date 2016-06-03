<?php

namespace Eoola;

use Illuminate\Database\Eloquent\Model;

class Class extends Model
{
    protected $fillable = [
    	'name'
    ];

    public function students()
    {
        return $this->hasMany('Eoola\Student', 'class_id','id');
    }
}
