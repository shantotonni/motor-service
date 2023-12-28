<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\App\Section;
use Faker\Generator as Faker;

$factory->define(App\Section::class, function (Faker $faker) {
    return [
                "location_id"=>$faker->numberBetween(1,2),
        "department_id"=>$faker->numberBetween(1,2),
        "name"=>$faker->name,
        "code"=>str_random(10),

    ];
});
