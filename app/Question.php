<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable=[
    'questiontype',
    ];
        public function topic()
    {
        return $this->belongsTo('App\Topic');
    }
     public function multiquestion()
    {
        return $this->hasMany('App\MultiQuestion');
    }
     public function truefalsequestion()
    {
        return $this->hasMany('App\TrueFalseQuestion');
    }
     public function shortquestion()
    {
        return $this->hasMany('App\ShortQuestion');
    }
}
