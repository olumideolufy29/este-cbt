<?php

namespace Eoola;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
	protected $fillable = [
        'gender',
        'user_id',
        'subject_id',
    ];

    public function user()
    {
        return $this->belongsTo('Eoola\User', 'user_id');
    }
	public function subject()
    {
        return $this->belongsTo('Eoola\Subject', 'subject_id');
    }
}
