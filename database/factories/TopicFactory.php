<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Topic;
use Faker\Generator as Faker;

$factory->define(Topic::class, function (Faker $faker) {
    return [
        'name' =>$faker->name,
        'photo'=>'backendtemplate/topicimg/'. $faker->image('public/backendtemplate/topicimg',100,100,null,false),
        'subject_id' =>random_int(\DB::table('subjects')->min('id'),\DB::table('subjects')->max('id')),
        'level_id' =>random_int(\DB::table('levels')->min('id'),\DB::table('levels')->max('id')),
        'user_id' =>random_int(\DB::table('users')->min('id'),\DB::table('users')->max('id')),
    ];
});
