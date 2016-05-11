<?php

namespace Eoola;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'code', 'name',
    ];
	
	public function tests()
    {
        return $this->hasMany('Eoola\Test', 'subject_id','id');
    }
}
