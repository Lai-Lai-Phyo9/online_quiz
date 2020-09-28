<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrueFalseQuestion extends Model
{
    protected $fillable=[
    'name','photo','answer','question_id',
    ];
     public function question()
    {
        return $this->belongsTo('App\Question');
    }
        public function users()
    {
    	return $this->belongsToMany('App\User')
    				->withPivot('answer','mark')
    				->withTimestamps();
    }
}
