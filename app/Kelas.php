<?php

namespace Eoola;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
	protected $table = "classes";
    protected $fillable = [
    	'name'
    ];

    public function students()
    {
        return $this->hasMany('Eoola\Student', 'class_id','id');
    }
}
