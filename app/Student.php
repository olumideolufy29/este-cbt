<?php

namespace Eoola;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $fillable = [
        'gender',
        'user_id',
        'class_id',
    ];

    public function user()
    {
        return $this->belongsTo('Eoola\User', 'user_id');
    }
	public function inClass()
    {
        return $this->belongsTo('Eoola\Kelas', 'class_id');
    }
        
}
