<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image','university_school','work_organization'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function multiquestions()
    {
        return $this->belongsToMany('App\MultiQuestion','multi_user')
                    ->withPivot('answer','mark')
                    ->withTimestamps();
    }

    public function truefalsequestions()
    {
        return $this->belongsToMany('App\TrueFalseQuestion','true_user')
                    ->withPivot('answer','mark')
                    ->withTimestamps();
    }
    public function shortquestions()
    {
        return $this->belongsToMany('App\ShortQuestion','short_user')
                    ->withPivot('answer','mark')
                    ->withTimestamps();
    }

    public function suggestion()
    {
        return $this->belongsTo('App\Suggestion');
    }   
}
