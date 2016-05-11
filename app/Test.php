<?php

namespace Eoola;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'name',
        'code',
        'duration',
        'type',
        'user_id',
        'subject_id',
    ];

    public function questions()
    {
        return $this->hasMany('Eoola\Question', 'test_id','id');
    }

    public function results()
    {
        return $this->hasMany('Eoola\Result', 'test_id','id');
    }

    public function subject()
    {
        return $this->belongsTo('Eoola\Subject', 'subject_id');
    }

    public function created_by()
    {
        return $this->belongsTo('Eoola\User', 'user_id');
    }
}
