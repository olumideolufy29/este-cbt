<?php

namespace Eoola;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'answer', 'user_id', 'question_id',
    ];

    public function question()
    {
        return $this->belongsTo('Eoola\Question', 'question_id');
    }

    public function answered_by()
    {
        return $this->belongsTo('Eoola\User', 'user_id');
    }

}

