<?php

namespace Eoola;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'type',
        'question',
        'correct_answer',
        'a',
        'b',
        'c',
        'd',
        'e',
        'test_id',
        'difficulty',
    ];

    public function test()
    {
        return $this->belongsTo('Eoola\Test', 'test_id');
    }

    public function answers()
    {
        return $this->hasMany('Eoola\Answer', 'question_id','id');
    }

}
