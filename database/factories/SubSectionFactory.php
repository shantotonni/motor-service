<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\App\SubSection;
use Faker\Generator as Faker;

$factory->define(App\SubSection::class, function (Faker $faker) {
    return [
                "section_id"=>$faker->numberBetween(1,2),
        "name"=>$faker->name,
        "code"=>str_random(10),
        "salary_per_day"=>$faker->randomNumber,
        "ot_hr_rate"=>$faker->randomNumber,
        "ot_fraction"=>$faker->randomNumber,

    ];
});
