<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultiQuestion extends Model
{
    protected $fillable=[
    'name','photo','choice1','choice2','choice3','choice4','answer','question_id',
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
