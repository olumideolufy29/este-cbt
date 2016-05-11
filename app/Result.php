<?php

namespace Eoola;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
	protected $fillable = [
        'score', 'user_id', 'test_id',
    ];

    public function test()
    {
        return $this->belongsTo('Eoola\Test', 'test_id');
    }

    public function user()
    {
        return $this->belongsTo('Eoola\User', 'user_id');
    }
}
