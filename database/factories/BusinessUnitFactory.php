<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\App\BusinessUnit;
use Faker\Generator as Faker;

$factory->define(App\BusinessUnit::class, function (Faker $faker) {
    return [
                "name"=>$faker->name,
        "code"=>str_random(10),
        "company_id"=>$faker->numberBetween(1,2),

    ];
});
