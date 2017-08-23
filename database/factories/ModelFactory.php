<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/



/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    //These methods allow you to seed the database
    //Go to php artisan tinker and hit
    //factory('App\User')->create()
    //If you want to make more factory('App\User', 50)->create()
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {

    return [
        //For the user, rather than hardcoding it, we create a function
        //that uses factories to create a user and return the id
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        },
        'title' => $faker->sentence,
        'body' => $faker->paragraph()
    ];
});