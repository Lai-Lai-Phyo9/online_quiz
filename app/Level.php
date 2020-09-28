<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable=[
    'name',
    ];
     public function topics()
    {
        return $this->hasMany('App\Topic');
    }

}
